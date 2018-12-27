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
     * White list of routes that do not require detection
     *
     * @var array
     */
    protected static $whiteList = [
        'api/health',
        'api/admin/auth/login',
        'api/admin/auth/refresh'
    ];
    
    /**
     * ApiAuthMiddleware constructor.
     *
     * @param UserPermissionService $userPermissionService
     */
    public function __construct(UserPermissionService $userPermissionService)
    {
        $this->userPermissionService = $userPermissionService;
    }
    
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
        if (!in_array($request->route()->uri(), self::$whiteList, true)) {
            /** @var \App\Models\Admin $userModel */
            $userModel = auth('admin_api')->user();
    
            if (!$userModel) {
                throw new AuthenticationException();
            }
        
            if (!$this->userPermissionService->assertHasPermission($request, $userModel)) {
                throw new AuthenticationException('无权操作');
            }
        }
        
        return $next($request);
    }
}
