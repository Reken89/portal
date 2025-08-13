<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Delo
{
    public function handle($request, Closure $next)
    {
        $role = Auth::user()->role();
        if($role !== "delo" && $role !== "deloadm"){
            return redirect()->route('home');
        }
        return $next($request);
    }
}

