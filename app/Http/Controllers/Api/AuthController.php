<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthRequest;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use Helpers;

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized();
        }

        return $this->response->array(['token' => $token]);
    }

    public function me()
    {
        return auth('api')->user();  // auth:api
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('admin')->attempt($credentials)) {
            return $this->response->errorUnauthorized();
        }

        return $this->response->array(['token' => $token]);
    }

    public function admin()
    {
        return auth('admin')->user();  // auth:api
    }
}
