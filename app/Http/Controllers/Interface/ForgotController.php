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

    // BL quên mật khẩu
    public function forgotPost(Request $request)
    {
        if (User::where('email', $request->email)->first()) {
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
            return redirect()->route('interface.forgotpass')->with(['msg' => 'Email chưa đăng ký hoặc bị xóa do ảnh hưởng đến shop và không được để trống ! ', 'type' => 'danger']);
        }
    }
    // Xử lý mã xác minh email
    public function verification()
    {
        return view('interface.email.verification', ['title' => 'xác minh']);
    }

    // Dùng phương thức Post
    public function verifiPost(Request $request)
    {
        //kiểm tra tokeen resetpass
        if (!session('token_resetpass') || $request->token !== session('token_resetpass')) {
            return redirect()->route('interface.verification')->with(['msg' => 'Mã không hợp lệ hoặc mã của bạn đã hết hạn và không được để trống ', 'type' => 'danger']);
        } else {
            return redirect()->route('interface.resetpass');
        }
    }
    // Xử lý đặt lại mật khẩu
    public function resetPassword()
    {
        return view('interface.resetpassword', ['title' => 'Đặt lại mật khẩu']);
    }
    // BL đặt lại mật khẩu
    public function updatePass(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/|confirmed',
            'password_confirmation' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/'
        ], [
            'password.required' => 'Không được để trống thông tin',
            'password_confirmation.required' => 'Không được để trống thông tin',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa hoặc một số',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp',
            'password_confirmation.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password_confirmation.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa hoặc một số',
        ]);
        $user = User::where('email', session('user_email'))->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('interface.login')->with(['msg' => 'Đặt lại mật khẩu thành công', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'Đặt lại mật khẩu thất bại', 'type' => 'danger']);// lỗi hệ thống
        }
    }
}
