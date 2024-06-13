<?php

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\products;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/product/list', function (Request $request) {
    $products = products::get()->take(10);
    return json_encode($products);
});

route::get('/categories/list',function() {
    $categories = categories::get()->take(10);
    return json_decode(($categories));
});
