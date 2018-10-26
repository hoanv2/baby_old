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

        $products = new Product();
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->description = $data['description'];
        $products->content = $data['content'];
        $products->slug = str_slug($data['name']);
        $products->image = $data['image'];
        $products->category()->attach($data['category_id']);
        $products->save();

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
        $categories = DB::table('category_product')->get();
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

        $request->session()->flash('flash_success', trans('common.create_success'));

        $data['slug'] = str_slug($data['name']);

//        $product = new Product();
//        $product->category()->update($data['category_id']);
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
