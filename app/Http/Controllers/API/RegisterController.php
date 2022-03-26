<?php

namespace App\Http\Controllers\API;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email',
            'password' =>'required',
            'c_password' =>'required|same:password',
        ]); 

        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
        }

           //$input = $request->all();
           //dd($input);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => \Hash::make($request->password),
                'type' => 'User'
            ]);
            $success['token'] = $user->createToken('password')->plainTextToken;
            $success['name'] = $user->name;

        return $this->sendResponse($success ,'User registered successfully' );
    }


    public function login(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
        
            $user = Auth::User();
            $success['token'] = $user->createToken('password')->plainTextToken;
            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['phone'] = $user->phone;
            $success['email'] = $user->email;
            return $this->sendResponse($success ,'User login successfully');
        }
        else{
            return $this->sendError('Please check your Auth' ,['error'=> 'Unauthorized'] );
        }

    }


    public function logout(Request $request){
       // dd(10);
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status_code'=>200, 
            'token'=> 'Token Deleted successfully'
             ]
         );
    }
}