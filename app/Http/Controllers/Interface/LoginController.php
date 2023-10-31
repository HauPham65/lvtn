<?php

namespace App\Http\Controllers\interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('interface.login',['title'=>'Đăng nhập']);
    }

    public function loginPost(Request $request)
    {
        //sử dụng Laravel's Auth để thử đăng nhập người dùng.thử đăng nhập bằng cách so sánh username và password từ request với dữ liệu trong csdl và gán kết quả và $checklogin
        $check_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        /**
         * kiểm tra kết quả đăng nhập từ biến $check_login.
         * Nếu đăng nhập không thành công đá về trang đăng nhập.
         * ngược lại đã đăng nhập thành công
         * lấy thông tin người dúng gán vào $user
         * kiểm tra trạng thái người dùng (có hai trạng thái 1:tài khoản được phép sử dụng 2:tài khoản đã bị khoá) nếu là 1 đăng nhập thành công
         * ngược lại sẽ đăng xuất người dùng (Auth::logout()) và sau đó chuyển hướng người dùng trở lại trang trước đó (back) với thông báo tài khoản bị khóa.
         */
        if(!$check_login)
        {
            return redirect()->route('interface.login')->with(['msg'=>'thông tin đăng nhập không đúng','type'=>'danger']);
        }else{
            $user = Auth::user();
            if($user->status == 1)
            {
                return redirect()->route('interface.home');
            }else{
                Auth::logout();
                return redirect()->back()->with(['msg'=>'Tài khoản bị khóa ','type'=>'danger']);
            }
        }
    }

    public function logOut()
    {
        if(!Auth::check())
        {
            return redirect()->route('interface.home')->with(['msg'=>'bạn chưa đăng nhập']);
        }
        Auth::logout();
        return redirect()->route('interface.login')->with(['msg'=>'bạn đã đăng xuất khỏi hệ thống ','type'=>'danger']);
    }

}
