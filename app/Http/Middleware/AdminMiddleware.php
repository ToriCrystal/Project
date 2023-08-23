<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == '1') {
            return $next($request);
        }

        return redirect('/'); // Hoặc có thể chuyển hướng đến một trang thông báo lỗi
    }
}
