<?php

namespace App\Http\Middleware;

use App\Services\Admin\UserPermission\UserPermissionService;
use Closure;
use Illuminate\Auth\AuthenticationException;

class ApiAuthMiddleware
{
    /**
     * @var UserPermissionService
     */
    protected $userPermissionService;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        $userModel = auth('admin_api')->user();
        
        if (!$userModel) {
            throw new AuthenticationException('21312321321321');
        }
        
        return $next($request);
    }
}
