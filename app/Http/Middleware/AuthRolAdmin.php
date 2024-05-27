<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\RolType;

class AuthRolAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->authorizeRoles(RolType::Admin->value)) {
            return redirect('principal');
        }
        return $next($request);
    }
}
