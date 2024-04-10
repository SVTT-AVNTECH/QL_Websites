<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Kiểm tra xem người dùng có quyền sửa không
            if (Auth::user()->hasPermission('review_post')) {
                // Nếu có quyền sửa, tiếp tục thực hiện request
                return $next($request);
            } else {
                // Nếu không có quyền sửa, chuyển hướng hoặc trả về lỗi
                return redirect()->route('dashboard')->with('error', 'You do not have permission to edit websites.');
            }
        }

        // Nếu người dùng chưa đăng nhập, chuyển hướng hoặc trả về lỗi
        return redirect()->route('login')->with('error', 'You must be logged in to edit websites.');
    }
}
