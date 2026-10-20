<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     
    public function handle($request, Closure $next, ...$roles)
{
    $user = $request->user();

    if (!$user || !in_array($user->role, $roles))
    {
        abort(403);
    }

    return $next($request);
}*/


public function handle($request, Closure $next, ...$roles)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (!in_array(auth()->user()->role, $roles)) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
}
