<?php

namespace App\Http\Controllers\interface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        //gọi giao diện đăng ký
        return view('interface.Register', ['title' =>'Đăng ký']);
    }
    // Phương thức POST BL
  
    public function registerPost(Request $request)
    {
        $check_user = User::select('username', 'email')
            ->where('username', $request->username)
            ->Orwhere('email', $request->email)
            ->first();
        if ($check_user) {
            return redirect()->route('interface.register')->with(['msg' => 'Tài khoản đã tồn tại', 'type' => 'danger']);
        }
        $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/|confirmed',
            'email' => 'required|email',


        ], [
            'username.required' => 'Tên không được để trống',
            'username.min' => 'Tên phải có ít nhất 6 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa và một số',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',

        ]);

        // Lưu dữ liệu vào session
        $tempUser = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ];
        $request->session()->put('temp_user', $tempUser);
                $emailler = $request->email;
        $token_re ='H&T-'. Str::random(8);
        $request->session()->put('token_register', $token_re, 120);
        $request->session()->put('register_email', $emailler);
        $registerurl = route('interface.verification_register');

        Mail::send('interface.email_register.emailregister', compact('emailler', 'registerurl', 'token_re'), function ($email) use ($emailler) {
            $email->subject('Xác thực đăng ký tài khoản')
                ->to($emailler, 'Cửa hàng laptop H&T');
        });
        return redirect()->route('interface.verification_register')->with(['msg' => 'nhập mã xác thực để đăng ký', 'type' => 'success']);
    }

    public function verification_register()
    {
        return view('interface.email_register.verification_register', ['title' => 'Xác thực đăng ký']);
    }

    public function verification_register_post(Request $request)
    {
        $token = $request->input('token');
        if ($token === $request->session()->get('token_register')) {
            $tempUser = $request->session()->get('temp_user');
            User::create($tempUser);
            $request->session()->forget(['temp_user', 'token_register', 'register_email']);

            return redirect()->route('interface.login')->with(['msg' => 'Đăng ký thành công. Vui lòng đăng nhập.', 'type' => 'success']);
        } else {
            return redirect()->route('interface.verification_register')->with(['msg' => 'Mã xác thực không chính xác.',  'type' => 'danger']);
        }
    }
}
