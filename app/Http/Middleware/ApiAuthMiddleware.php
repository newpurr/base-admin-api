<?php

namespace App\Http\Middleware;

use App\Exceptions\NotAllowedException;
use App\Http\Middleware\Hepler\ExceptUriTrait;
use App\Services\Admin\UserPermission\UserPermissionService;
use Closure;
use Illuminate\Auth\AuthenticationException;

class ApiAuthMiddleware
{
    use ExceptUriTrait;
    
    /**
     * @var UserPermissionService
     */
    protected $userPermissionService;
    
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
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
     * @throws \App\Exceptions\NotAllowedException
     */
    public function handle($request, Closure $next)
    {
        if (!$status = $this->inExceptArray($request)) {
            /** @var \App\Models\Admin $userModel */
            $userModel = auth('admin_api')->user();
            
            if (!$userModel || !$userModel->isNormality()) {
                throw new AuthenticationException();
            }
            
            if (!$this->userPermissionService->assertHasPermission($request, $userModel)) {
                throw new NotAllowedException();
            }
        }
        
        return $next($request);
    }
}
