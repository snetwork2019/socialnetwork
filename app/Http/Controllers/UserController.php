<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Auth\AuthenticationException;
use Auth;

class UserController extends Controller
{
    public function logoutApi()
	{ 
	    if (Auth::check()) {
	       Auth::user()->AauthAcessToken()->delete();
	    }
	}

	public function logout(Request $request) {
		$input = $request->all();
		$accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(null, 204);
    }
}
