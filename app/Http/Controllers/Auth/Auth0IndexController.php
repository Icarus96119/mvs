<?php

namespace MVS\Http\Controllers\Auth;

use Illuminate\Http\Request;
use MVS\Http\Controllers\Controller;

class Auth0IndexController extends Controller
{
    /**
     * Redirect to the Auth0 hosted login page
     * 
     * @return mixed
     */
    public function login()
    {
        return \App::make('auth0')->login(null, null, ['scope' => 'openid email email_verified'], 'code');
    }

    /**
     * Log out of Auth0
     * 
     * @return mixed
     */
    public function logout()
    {
       
    }
}