<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\manufactuers;
use App\Models\order_details;
use App\Models\orders;
use App\Models\products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //Xử lý giao diện sản phẩm bán chạy nhất
    public function index()
    {
        $categories = categories::select('id', 'name')->get();
        $manufacts = manufactuers::select('id', 'name')->get();
       
        return view('interface.home.index', [
            'title' => 'trang chủ',
            'categories' => $categories,
            'manufacts' => $manufacts,
        ]);
    }
    
}
