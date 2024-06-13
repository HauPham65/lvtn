<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.system.loginAdmin',[
            'title'=>'Đăng nhập'
        ]);
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'không được để trống',
            'email.email' => 'email không đúng định dạng',
            'password.required' => 'mật khẩu không được để trống',
        ]);
    
        $kt = Auth::guard('admin')->attempt(['admin_email' => $request->email, 'password' => $request->password]);
        if (!$kt) {
            return redirect()->route('admin.login')->with(['msg' => 'Thông tin đăng nhập không đúng', 'type' => 'danger']);
        } else {
            $admin = Auth::guard('admin')->user();
            if ($admin) {
                $admin_id = $admin->id;
                $request->session()->put('id', $admin_id);
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();
            }
        }
    }

    public function logOut()
    {
        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
        }
       
        return redirect()->route('admin.login')->with(['msg'=>'Bạn đã đăng xuất khỏi hệ thống ','type'=>'danger']);
    }
}