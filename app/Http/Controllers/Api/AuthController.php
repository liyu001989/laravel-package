<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthRequest;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\Transformers\TopicTransformer;

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

    public function me(UserTransformer $transformer)
    {
        return $this->response->item(auth('api')->user(), $transformer);
    }

    public function userIndex(UserTransformer $transformer)
    {
        $users = User::paginate(5);
        return $this->response->paginator($users, $transformer);
    }

    public function topicIndex(TopicTransformer $transformer)
    {
        $topics = Topic::paginate();
        return $this->response->paginator($topics, $transformer, ['key' => 'topic']);
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
