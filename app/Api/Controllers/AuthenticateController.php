<?php

namespace App\Api\Controllers;

use App\Api\Transformers\UsersTransformer;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends BaseController
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials', 'message' => 'Wrong credentials. Try again'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token', 'message' => 'Could not create token. Try again'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $newUser = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ];
        try {
            $user = User::create($newUser);
        } catch (Exception $e) {
            return response()->json(['error' => 'User already exists.'],401);
        }
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        // the token is valid and we have found the user via the sub claim
        return $this->item($user, new UsersTransformer);
    }

    public function refreshToken()
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            return $this->error('Token NOT provided!', 401);
        }
        $token = JWTAuth::refresh($token);

        return response()->json(compact('token'));
    }
}