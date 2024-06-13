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
    // Form đăng nhập và BL
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Tài khoản không được để trống ',
            'email.email' => 'E-mail không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);
        $check_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if(!$check_login)
        {
            return redirect()->route('interface.login')->with(['msg'=>'Thông tin đăng nhập không đúng','type'=>'danger']);
        }else{
            $user = Auth::user();
                $user_id = $user->id; // Lấy ID người dùng từ đối tượng $user
                // Lưu ID của người dùng vào session
                $request->session()->put('id', $user_id);
                return redirect()->route('interface.home');
        }
    }

    public function logOut()
    {
        if(Auth::check())
        {
            Auth::logout();
        }
        return redirect()->route('interface.login')->with(['msg'=>'Bạn đã đăng xuất khỏi hệ thống ','type'=>'danger']);
    }

}
