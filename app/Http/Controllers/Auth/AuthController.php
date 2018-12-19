<?php

namespace App\Http\Controllers\Auth;

use App\Constant\JsonResponseCode;
use App\Http\Controllers\Controller;
use SuperHappysir\Utils\Response\JsonResponseBodyInterface;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh']]);
    }
    
    /**
     * Get a JWT via given credentials.
     * @return JsonResponseBodyInterface
     */
    public function login() : JsonResponseBodyInterface
    {
        $username = request('name');
        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;
    
        $credentials['password'] = request('password');
        
        if (!$token = auth()->attempt($credentials)) {
            return json_error_response(JsonResponseCode::UNAUTHORIZED, 'Unauthorized');
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
        return json_success_response(auth()->user());
    }
    
    /**
     * Log the user out (Invalidate the token).
     * @return JsonResponseBodyInterface
     */
    public function logout() : JsonResponseBodyInterface
    {
        auth()->logout();
    
        return json_success_response([], 'Successfully logged out');
    }
    
    /**
     * Refresh a token.
     * @return JsonResponseBodyInterface
     */
    public function refresh() : JsonResponseBodyInterface
    {
        return json_success_response(
            $this->respondWithToken(auth()->refresh())
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
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ];
    }
}
