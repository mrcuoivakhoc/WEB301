<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Hoặc điều hướng tới trang khác nếu cần
        }

        return $next($request);
    }
}
