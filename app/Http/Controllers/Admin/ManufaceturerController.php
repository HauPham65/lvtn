<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\manufactuers;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class ManufaceturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = manufactuers::select()->paginate(5);
        return view('admin.manufactures.list', ['list' => $list, 'title' => 'Quản lý hãng sản xuất']);
    }


    public function check_id($id)
    {
        $item = manufactuers::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('manufact.index')->with(['msg' => 'không tìm thấy mã' . $id . 'của hãng', 'type' => 'danger']);
        }
        return $item;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::select('id', 'name')->get();
        return view('admin.manufactures.general_manufact', ['title' => 'Thêm hãng sản xuất', 'categories' => $categories, 'action' => route('manufact.store'), 'method' => 'post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'categories_id' => 'required'
        ], [
            'name' => 'không được để trống',
            'categories_id' => 'không được để tróng'
        ]);

        if (manufactuers::select('name')->where('name', $request->name)->first()) {
            return redirect()->route('manufact.create')->with(['msg' => 'tên hãng đã tồn tại', 'type' => 'danger']);
        }

        try {
            $manufact = manufactuers::create([
                'name' => $request->name,
                'categories_id' => $request->categories_id,
            ]);
            if ($manufact) {
                return redirect()->route('manufact.create')->with(['msg' => 'thêm thành công', 'type' => 'success']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('manufact.create')->with(['msg' => $th->getMessage(), 'type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->check_id($id);
        $categories = categories::select('id', 'name')->get();
        return view('admin.manufactures.general_manufact', ['title' => 'Cập nhật hãng sản xuất', 'item' => $item, 'categories' => $categories, 'action' => route('manufact.update', $item->id), 'method' => 'put', 'submit' => 'cập nhật']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'categories_id' => 'required'
        ], [
            'name' => 'không được để trống',
            'categories_id' => 'không được để tróng'
        ]);


        try {
            $item = manufactuers::find($id);
            if ($item) {
                $item->name = $request->name;
                $item->categories_id = $request->categories_id;
                if ($item->save()) {
                    return redirect()->route('manufact.edit', $item->id)->with(['msg' => 'cập nhật thành công hãng sản xuất', 'type' => 'success']);
                } else {
                    return redirect()->route('manufact.edit', $item->id)->with(['msg' => 'cập nhật thất bại ', 'type' => 'success']);
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
            return redirect()->route('manufact.index')->with(['msg' => 'xoá thành công hãng sản xuất mã '. $item->id, 'type' => 'success']);
        }
        return redirect()->route('manufact.index')->with(['msg' => 'xoá không thành công hãng sản xuất mã' . $item->id, 'type' => 'danger']);
    }
}
