<?php

namespace App\Http\Middleware\Hepler;

/**
 * Trait ExceptUriTrait
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Http\Middleware\hepler
 */
trait ExceptUriTrait
{
    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function inExceptArray($request) : bool
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            
            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }
        
        return false;
    }
}
