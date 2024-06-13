<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\manufactuers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class ManufaceturerController extends Controller
{
    /**
     * Display a listing of the resource.
     * gọi giao diện danh sách hãng sản xuất
     */
    public function index()
    {
        $list = manufactuers::select()->paginate(5);
        return view('admin.manufactures.list_manufact', ['list' => $list, 'title' => 'Quản lý hãng sản xuất']);
    }

    // hàm kiểm kiểm tra id
    public function check_id($id)
    {
        $item = manufactuers::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('manufact.index')->with(['msg' => 'Không tìm thấy mã' . $id . 'của hãng', 'type' => 'danger']);
        }
        return $item;
    }
  
    public function create()
    {
        $categories = categories::select('id', 'name')->get();
        return view('admin.manufactures.general_manufact', [
            'title' => 'Thêm hãng sản xuất',
            'categories' => $categories,
            'action' => route('manufact.store'),
            'method' => 'post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * hàm xử lý và thêm hãng sản xuất vào csdl
     *
     */
    public function store(Request $request)
    {
        // kiểm tra điều kiện đầu vào
        $request->validate([
            'name' => 'required',
        ], [
            'name' => 'Không được để trống',
        ]);
        if (manufactuers::select('name')->where('name', $request->name)->first()) {
            return redirect()->route('manufact.create')->with(['msg' => 'Tên hãng đã tồn tại', 'type' => 'danger']);
        }

        try {
            $manufact = manufactuers::create([
                'name' => $request->name,
            ]);
            if ($manufact) {
                return redirect()->route('manufact.create')->with(['msg' => 'Thêm thành công', 'type' => 'success']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('manufact.create')->with(['msg' => $th->getMessage(), 'type' => 'danger']);
        }
    }

    
    public function edit($id)
    {
        $item = $this->check_id($id);
        $categories = categories::select('id', 'name')->get();
        return view('admin.manufactures.general_manufact',
            [
                'title' => 'Cập nhật hãng sản xuất',
                'item' => $item,
                'categories' => $categories,
                'action' => route('manufact.update', $item->id),
                'method' => 'put', 'submit' => 'Cập nhật'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * tiến hành xử lý và cập nhật lại sản phẩmq
     */
    public function update(Request $request, $id)
    {
        //kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
        ], [
            'name' => 'Không được để trống',
        ]);

        try {  
            $item = manufactuers::find($id);
            if ($item) {
                $item->name = $request->name;
                if ($item->save()) {
                    return redirect()->route('manufact.edit', $item->id)->with(['msg' => 'Cập nhật thành công hãng sản xuất', 'type' => 'success']);
                } else {
                    return redirect()->route('manufact.edit', $item->id)->with(['msg' => 'Cập nhật thất bại ', 'type' => 'success']);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('manufact.edit', $item->id)->with(['msg' => $th->getMessage(), 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = manufactuers::find($id);
        if ($item) {
            $item->delete();
            return redirect()->route('manufact.index')->with(['msg' => 'Xoá thành công hãng sản xuất mã ' . $item->id, 'type' => 'success']);
        }
        return redirect()->route('manufact.index')->with(['msg' => 'Xoá không thành công hãng sản xuất mã' . $item->id, 'type' => 'danger']);
    }
}
