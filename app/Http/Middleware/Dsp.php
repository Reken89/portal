<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dsp
{
    public function handle($request, Closure $next)
    {
        $role = Auth::user()->role();
        if($role !== "deloadm"){
            return redirect()->route('home');
        }
        return $next($request);
    }
}