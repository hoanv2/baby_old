<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'bỉm',
            'price' => '200.000',
            'content' => 'Tã-bỉm quần cho bé gái Moonyman được làm từ chất liệu vải mới siêu mềm mại cùng thun hông nguyên vòng co giãn theo từng chuyển động của bé, cho bé cảm giác thoải mái, dễ chịu. • ​Bề mặt tã siêu mềm mịn, thân thiện với làn da nhạy cảm của bé • Có chỉ thị ướt giúp mẹ biết được thời điểm cần thay tã (khi tã đầy, dải băng chỉ thị sẽ chuyển hoàn toàn sang màu xanh đậm, đó là thời điểm cần thay tã) • Có dải băng dính cuốn miếng tã sau sử dụng, giúp mẹ vứt bỏ miếng tã sau sử dụng một cách sạch sẽ và tiện lợi • Thiết kế ngộ nghĩnh với hình gấu Pooh xinh xắn đầy màu sắc',
            'description' => 'Tã-bỉm quần cho bé gái',
            'slug' => 'bim',
        ]);
    }
}
