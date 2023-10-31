<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $list = User::select('id','username')->first();
        return view('interface.home.index',['title'=>'trang chủ','list'=>$list]);
    }
}
