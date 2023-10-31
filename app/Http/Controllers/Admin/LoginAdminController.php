<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('interface.login',['title'=>'đăng nhập']);
    }
}
