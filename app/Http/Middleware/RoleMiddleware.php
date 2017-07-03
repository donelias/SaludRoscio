<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

public function handle($request, Closure $next)
{
    $user = Auth::user();

    if ($user->role_id != '1'){
        return Redirect('/home')
            ->with('message', 'Acceso restringido!, Solo para Administradores.');
    }

    return $next($request);
}
}
