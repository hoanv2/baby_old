<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create',compact('categories','products'));
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $path = $request->file('image')->store('image');
            $data['image'] = $path;
        }

        $data['slug'] = str_slug($data['name']);

        $products = Product::create($data);

        if ($products) {
            return redirect()->route('products.index')->with(['flag'=>'success','toastr.success'=>'Thêm Mới Thành Công']);
        }
        else {
            return redirect()->back()->with(['flag' => 'danger', 'messages' => 'Thêm Mới ko Thành Công']);
        }
    }

    public function show($id)
    {
        $products = Product::where('id',$id)->first();
        return view('admin.product.show',compact('products'));
    }

    public function edit($id)
    {
        $categories = Category::get();

        $products = Product::where('id',$id)->first();
        return view('admin.product.edit',compact('products','categories'));

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('image');
            $data['image'] = $path;
        }
        else{
            unset($data['image']);
        }
        $data['slug'] = str_slug($data['name']);

        $products = Product::find($id)->update($data);
        if ($products) {
            return redirect()->route('products.index')->with(['flag'=>'success','toastr.success'=>'Thêm Mới Thành Công']);
        }
        else {
            return redirect()->back()->with(['flag' => 'danger', 'messages' => 'Thêm Mới ko Thành Công']);
        }

    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json([
            'errors' =>false,
            'messages' => 'xóa thành công',
        ]);
    }
}
