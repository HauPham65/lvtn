<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenInterface
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('interface.login')->with(['msg' => 'Vui lòng đăng nhập', 'type' => 'danger']);
        }
        $userIdFromRoute = $request->route('id'); // lấy giá trị của tham số id từ đường dẫn URL hiện tại.
        $userIdFromSession = Auth::id(); // Auth::id() để lấy ID của người dùng đã đăng nhập từ phiên hiện tại
        // xác minh ID trong URL (được truyền qua tham số {id}) khớp với ID của người dùng đang đăng nhập.
        if ($userIdFromRoute != $userIdFromSession) {
            return redirect()->route('interface.login')->with(['msg'=>'Vui lòng đăng nhập','type'=>'danger']);
        }

        return $next($request);
    }
}
