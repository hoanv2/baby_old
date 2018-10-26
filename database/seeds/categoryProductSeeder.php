<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class categoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        //Categories that don't have child categories.
//        $categories = Category::where('id', '!=', 'sub_category_id')->get();
        foreach ($products as $product) {
            DB::table('category_product')->insert([
//                'category_id' => $categories->id,
                'product_id' => $product->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
