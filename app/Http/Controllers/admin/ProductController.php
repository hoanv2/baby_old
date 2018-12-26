<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
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
        $brands = Brand::get();
        return view('admin.product.create',compact('categories','products' , 'brands'));
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
        $products->save();
        $products->category()->attach($data['category_id']);
        if ($data['brand_id']){
            $products->brand()->attach($data['brand_id']);
        }

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
        $category = Category::join('category_products','categories.id','category_products.category_id')
                    ->where('category_products.product_id',$id)
                    ->first();
        $brands = Brand::join('brand_products','brands.id','brand_products.brand_id')
            ->where('brand_products.product_id',$id)
            ->first();
        return view('admin.product.show',compact('products' , 'category' , 'brands'));
    }

    public function edit($id)
    {
        $cates = Category::get();
        $catePros = DB::table('categories')
                    ->join('category_products' , 'categories.id','category_products.category_id')
                    ->where('category_products.product_id',$id)
                    ->select('categories.id as id','category_products.category_id as category_id','categories.name as name')
                    ->get();

        $products = Product::where('id',$id)->first();
        return view('admin.product.edit',compact('products','catePros' , 'cates'));
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
        $products = Product::find($id);
        if(!empty($data['category_id'])){

        }else{
            unset($data['category_id']);
        }
        $products->update($data);
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
