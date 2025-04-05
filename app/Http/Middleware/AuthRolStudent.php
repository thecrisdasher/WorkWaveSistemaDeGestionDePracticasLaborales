<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\RolType;
use Illuminate\Http\Request;

class AuthRolStudent
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
        if (!$request->user()->authorizeRoles(RolType::Estudiante->value)) {
            return redirect('principal');
        }
        return $next($request);
    }
}
