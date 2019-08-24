<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logoutApi()
	{ 
	    if (Auth::check()) {
	       Auth::user()->AauthAcessToken()->delete();
	    }
	}
}
