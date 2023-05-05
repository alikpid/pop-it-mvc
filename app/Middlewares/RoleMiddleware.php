<?php

namespace Middlewares;

use Exception;
use Src\Auth\Auth;
use Src\Request;

class RoleMiddleware
{
    public function handle(Request $request, string $roles) :void
    {
//        echo gettype($roles);
        if (!Auth::user()->hasRole(explode('|', $roles))) {
            throw new Exception('Forbidden for you');
        }
    }

//    public function handle(Request $request, string $roles)
//    {
//        $user = Auth::user();
//        var_dump($user->hasRole(explode('|', $roles)));
//    }

//    public function handle(Request $request, Closure $next, string $roles)
//    {
//        if (!Auth::user()->hasRole(explode('|', $roles))) {
//            abort(403, 'Unauthorized action.');
//        }
//        return $next($request);
//    }
}