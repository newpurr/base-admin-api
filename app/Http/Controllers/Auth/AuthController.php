<?php

namespace App\Http\Controllers\Auth;

use App\Constant\JsonResponseCode;
use App\Http\Controllers\Controller;

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
     * @return array
     */
    public function login() : array
    {
        $credentials = request([
            'name',
            'password'
        ]);
        if (!$token = auth()->attempt($credentials)) {
            return json_response()->error(JsonResponseCode::UNAUTHORIZED, 'Unauthorized');
        }
        
        return json_response()->success(
            $this->respondWithToken($token)
        );
    }
    
    /**
     * Get the authenticated User.
     * @return array
     */
    public function user() : array
    {
        return json_response()->success(auth()->user());
    }
    
    /**
     * Log the user out (Invalidate the token).
     * @return array
     */
    public function logout() : array
    {
        auth()->logout();
    
        return json_response()->success([], 'Successfully logged out');
    }
    
    /**
     * Refresh a token.
     * @return array
     */
    public function refresh() : array
    {
        return json_response()->success(
            $this->respondWithToken(auth()->refresh())
        );
    }
    
    /**
     * Get the token array structure.
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