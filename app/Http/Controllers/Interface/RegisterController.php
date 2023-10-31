<?php

namespace App\Http\Controllers\interface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    public function index()
    {
        //gọi giao diện đăng ký
        return view('interface.Register', ['title' => 'Đăng ký']);
    }


    public function registerPost(Request $request)
    {

        // thực hiện truy vấn csdl lấy các dữ liệu trùng với request nếu bất kỳ fields trùng trả về một đối tượng user ngược lại null
        $check_user = User::select('username', 'email')
            ->where('username', $request->username)
            ->Orwhere('email', $request->email)
            ->first();
        //nếu $user khác null,false,rỗng.0 có nghĩa tìm thấy user tương ứng đá ngược về giao diện đăng ký yêu cầu đăng ký tại khoản mới hoặc hướng cho người dùng từ đăng ký sang đăng nhập
        if ($check_user) {
            return redirect()->route('interface.register')->with(['msg' => 'tài khoản đã tồn tại', 'type' => 'danger']);
        }
        //check validate form kiểm tra dữ liệu đầu vào
        /**
         *
         * tất cả cái field không được rỗng
         * kiểm tra email và username đã tồn tại chưa
         * mật khẩu phải có chữ cái
         * email phải đúng định dạng
         * phone phải đúng độ dài của các nhà mạng vn thường 10 số
         * required : không được phép để trống
         * regex:/^(?=.*[a-z])(?=.*\d).+$/| laravel có sẵn hộ trợ
         * confirmed so sanh password
         *  định dạng đúng 10 số: phone phải đúng độ dài của các nhà mạng vn thường 10 số
         */
        $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/|confirmed',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|digits:10',

        ], [
            'username.required' => 'Tên không được để trống',
            'username.min' => 'Tên phải có ít nhất 6 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa và một số',
            'password.confirmed' => 'Mật khẩu và nhập lại mật khẩu không khớp',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'address.required' => 'Địa chỉ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.digits' => 'Số điện thoại phải có đúng 11 chữ số',
        ]);

        //thêm người dùng vào database
        try {
            $user = User::create([
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            if ($user) {
                return redirect()->route('interface.login')->with(['msg' => 'đăng ký thành công', 'type' => 'success']);
            } else {
                return redirect()->route('interface.register')->with(['msg' => 'đăng ký thất bại', 'type' => 'danger']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('interface.register')->with(['msg' => 'đăng ký thất bại.ht', 'type' => 'danger']);
        }
    }
}
