<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index',compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        Brand::create($data);
        return response()->json([
            'data' => $data,
            'status' => true,
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $data = Brand::find($id);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        Brand::find($data['id'])->update($data);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        Brand::destroy($id);
        return response()->json([
            'errors' =>false,
            'messages' => 'xóa thành công',
        ]);
    }
}
