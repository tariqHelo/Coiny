<?php


namespace App\Services;

use App\Http\Requests\AuthUserRequest;
use App\Http\Responses\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait AuthenticationUser
{
    public $request = AuthUserRequest::class;

    public function register()
    {
        $rules = $this->getAttribute()->registerRules();

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return Response::error(422)->withMessage($validator->errors()->first())->send();
        }

        $customer = Customer::query()->create(request()->only(['name', 'email', 'birthdate', 'password']));

        return Response::success([
            'customer' => $customer,
            'token' => $customer->createToken('customer')->plainTextToken
        ])->withMessage('Logged In.')->send();

    }

    public function getAttribute()
    {
        return new $this->request;
    }

    public function login()
    {
        $rules = $this->getAttribute()->loginRules();

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return Response::error()->withMessage($validator->errors()->first())->send();
        }
        $customer = Customer::query()
            ->where(DB::raw('BINARY `name`'), request('name')) // binary is using for case-sensitive string
            ->OrWhere(DB::raw('BINARY `email`'), request('email'))
            ->first();

        if (!$customer || !Hash::check(request('password'), $customer->password)) {
            return Response::error(422)->withMessage('account or password error.')->withErrors('error when login.')->send();
        }
        return Response::success([
            'customer' => $customer,
            'token' => $customer->createToken('user')->plainTextToken
        ])->withMessage('Logged In.')->send();
    }

    public function logout()
    {
        auth('customer')->user()->update([
            'online' => 0
        ]);
        auth('customer')->user()->tokens()->delete();

        return Response::success()->withMessage('logout successfully')->send();
    }
}
