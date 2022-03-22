<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Services\Authentication;

class AuthUserController extends Controller
{
    public function register()
    {
        return Authentication::for(Customer::class)->register();
    }

    public function login()
    {
        return Authentication::for(Customer::class)->login();
    }

    public function logout()
    {
        return Authentication::for(Customer::class)->logout();
    }

}
