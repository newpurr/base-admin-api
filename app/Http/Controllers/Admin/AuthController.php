<?php

namespace App\Http\Controllers\Admin;

use App\Constant\JsonResponseCode;
use App\Http\Controllers\Controller;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;

class AuthController extends Controller
{
    protected $exceptApiAuthUri = [
        'login', 'refresh'
    ];
    
    /**
     * Get a JWT via given credentials.
     * @return JsonResponseBodyInterface
     */
    public function login() : JsonResponseBodyInterface
    {
        $username = request('username');
        is_phone_num($username) ?
            $credentials['mobile']  = $username :
            $credentials['account'] = $username;
    
        $credentials['password'] = request('password');
        
        if (!$token = auth('admin_api')->attempt($credentials)) {
            return json_error_response(JsonResponseCode::UNAUTHORIZED, '账号或密码错误!');
        }
        
        return json_success_response(
            $this->respondWithToken($token)
        );
    }
    
    /**
     * Get the authenticated User.
     * @return JsonResponseBodyInterface
     */
    public function user() : JsonResponseBodyInterface
    {
        return json_success_response(auth('admin_api')->user());
    }
    
    /**
     * Log the user out (Invalidate the token).
     * @return JsonResponseBodyInterface
     */
    public function logout() : JsonResponseBodyInterface
    {
        auth('admin_api')->logout();
    
        return json_success_response([], 'Successfully logged out');
    }
    
    /**
     * Refresh a token.
     * @return JsonResponseBodyInterface
     */
    public function refresh() : JsonResponseBodyInterface
    {
        return json_success_response(
            $this->respondWithToken(auth('admin_api')->refresh())
        );
    }
    
    /**
     * Get the token
     * @param  string $token
     * @return array
     */
    protected function respondWithToken($token) : array
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('admin_api')->factory()->getTTL() * 60
        ];
    }
}
