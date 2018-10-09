<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        Category::create($data);
        return response()->json([
            'data' => $data,
            'mess' => 'ok'
        ]);
    }


    public function edit(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        Category::find($data['id'])->update($data);
        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json([
            'errors' =>false,
            'messages' => 'xóa thành công',
        ]);
    }
}
