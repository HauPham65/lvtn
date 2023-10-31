<?php

namespace App\Http\Controllers\interface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ForgotController extends Controller
{
    public function index()
    {

        return view('interface.email.forgotpass', ['title' => 'Quên mật khẩu']);
    }


    public function forgotPost(Request $request)
    {
        if (User::where('email', $request->email)->where('status', 1)->first()) {
            $emailler = $request->email;
            $token_pass = 'H&T-' . Str::random(8);
            //session(['token_resetpass'=>$token_pass]);
            $request->session()->put('token_resetpass', $token_pass, 120);
            $request->session()->put('user_email', $emailler);
            $resseturl = route('interface.verification');
            Mail::send('interface.email.email', compact('emailler', 'resseturl', 'token_pass'), function ($email) use ($emailler) {
                $email->subject('Yêu cầu đặt lại mật khẩu')
                    ->to($emailler, 'cửa hàng laptop H&T');
            });
            return redirect()->route('interface.verification')->with(['msg' => 'Chúng tôi đã gửi một email đặt lại mật khẩu đến địa chỉ email của bạn.', 'type' => 'success']);
        } else {
            return redirect()->route('interface.forgotpass')->with(['msg' => 'email chưa đăng ký tài khoản hoặc tài khoản bạn đã bị khoá', 'type' => 'danger']);
        }
    }

    public function verification()
    {
        return view('interface.email.verification', ['title' => 'xác minh']);
    }

    public function verifiPost(Request $request)
    {
        if (!session('token_resetpass') && $request->token !== session('token_resetpass')) {
            return redirect()->route('interface.verification')->with(['msg' => 'mã không hợp lệ hoặc mã của bạn đã hết hạn ', 'type' => 'danger']);
        } else {
            return redirect()->route('interface.reserpass');
        }
    }

    public function resetPassword()
    {
        return view('interface.resetpassword', ['title' => 'Đặt lại mật khẩu']);
    }

    public function updatePass(Request $request)
    {

        $request->validate([
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/|confirmed'
        ], [
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa và một số',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp'
        ]);
        $user = User::where('email', session('user_email'))->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('interface.login')->with(['msg' => 'đặt lại mật khẩu thành công', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'đặt lại mật khẩu thất bại', 'type' => 'danger']);
        }
    }

    
}
