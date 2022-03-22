<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\Profile\UserProfileResource;
use App\Http\Responses\Response;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use function auth;
use function request;

class UserProfileController extends Controller
{
    public $request = UserProfileRequest::class;

    public function updateImage()
    {
        $rules = $this->getAttribute()->rules();

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return Response::error(422)->withMessage($validator->errors()->first())->send();
        }
        if (gettype(request()->file('image')) != 'string') {
            request()->file('image')->store('users');
            $imageName = request()->file('image')->hashName();
        }
        Customer::query()->where('id', auth('customer')->id())->update([
            'image' => $imageName
        ]);
        return Response::success()->withMessage('تمت العملية بنجاح')->send();

    }

    public function getProfile()
    {
        $user = auth('customer')->user();
        return Response::success((new UserProfileResource($user)))->withMessage('تمت العملية بنجاح')->send();

    }

    public function updateProfile()
    {
        $rules = $this->getAttribute()->updateProfileRules();

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return Response::error(422)->withMessage($validator->errors()->first())->send();
        }
        Customer::query()->where('id', auth('customer')->id())
            ->update(request()->only('username', 'birthdate', 'city', 'description'));
        return Response::success()->withMessage('تمت العملية بنجاح')->send();
    }

    public function getAttribute()
    {
        return new $this->request;
    }
}
