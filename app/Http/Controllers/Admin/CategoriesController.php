<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function index()
    {
        $list = categories::select()->paginate(5);
        return view('admin.categories.list_cat', ['list' => $list, 'title' => 'Quản lý danh mục']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.general_cat', [
        'title' => 'Thêm danh mục', 
        'action' => route('categories.store'), 
        'method' => 'post'
    ]);
    }

    public function check_id($id)
    {
        $item = categories::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('manufact.index')->with(['msg' => 'Không tìm thấy mã' . $id . 'của loại', 'type' => 'danger']);
        }
        return $item;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ], [
            'name' => 'Không được để trống',
            'description' => 'Không được để tróng'
        ]);

        if (categories::select('name')->where('name', $request->name)->first()) {
            return redirect()->route('categories.create')->with(['msg' => 'Tên loại đã tồn tại', 'type' => 'danger']);
        }
        try {
            $categories = categories::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            if ($categories) {
                return redirect()->route('categories.create')->with(['msg' => 'Thêm thành công', 'type' => 'success']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('categories.create')->with(['msg' => $th->getMessage(), 'type' => 'danger']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $item = $this->check_id($id);
        return view('admin.categories.general_cat',
            [
                'title' => 'Cập nhật danh mục',
                'item' => $item,
                'action' => route('categories.update', $item->id),
                'method' => 'put',
                'submit' => 'Cập nhật'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ], [
            'name' => 'Không được để trống',
            'description' => 'Không được để tróng'
        ]);


        try {
            $item = categories::find($id);
            if ($item) {
                $item->name = $request->name;
                $item->description = $request->description;
                if ($item->save()) {
                    return redirect()->route('categories.edit', $item->id)->with(['msg' => 'Cập nhật thành công danh mục', 'type' => 'success']);
                } else {
                    return redirect()->route('categories.edit', $item->id)->with(['msg' => 'Cập nhật thất bại ', 'type' => 'success']);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('categories.edit', $item->id)->with(['msg' => $th->getMessage(), 'type' => 'danger']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $item = categories::find($id);
        // SELECT products.`name` AS ten_sp , categories.`name`
        // FROM products
        // JOIN categories ON categories.id = products.categories_id
        if ($item) {
            $item->delete();
            return redirect()->route('categories.index')->with(['msg' => 'Xoá thành công danh mục mã ' . $item->id, 'type' => 'success']);
        }
        return redirect()->route('categories.index')->with(['msg' => 'Xoá không thành công danh mục mã' . $item->id, 'type' => 'danger']);
    }
}
