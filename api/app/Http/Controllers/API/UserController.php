<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Oauth2;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        $user = User::updateOrCreate([
            'email' => $request->get('email'),
        ], [
            'name' => $request->get('name'),
            'picture' => $request->get('picture'),
            'api_token' => $request->get('token'),
            'password' => $request->get('token'),
        ]);

        return response()->json([
            'id' => $user->id,
        ]);
    }
}
