<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data = ['title'=>'Tran Sản Phẩm'];
        return view('interface.product.index',$data);
    }
}
