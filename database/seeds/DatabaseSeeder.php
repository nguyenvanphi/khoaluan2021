<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(rolesSeeder::class);
        // DB::table('roles')->insert(['name'=>'admin']);
        $this->call(categoryproductsSeeder::class);
        $this->call(productsSeeder::class);
        $this->call(imagesproductsSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(attributesSeeder::class);
        $this->call(attributevaluesSeeder::class);
        $this->call(statusordersSeeder::class);
        $this->call(infosSeeder::class);
    }
}
class rolesSeeder extends Seeder{
    public function run()
    {
        DB::table('roles')->insert([['id'=>'1','name'=>'admin'],['id'=>'2','name'=>'member']]);
    }
}
class categoryproductsSeeder extends Seeder{
    public function run()
    {
        DB::table('categoryproducts')->insert([
            ['name'=>'Veston','images'=>'1620666944'],
            ['name'=>'Quần kaki','images'=>'1620666997'],
            ['name'=>'Áo sơ mi','images'=>'1620666879'],
            ['name'=>'Áo khoác','images'=>'1620666960'],
            ['name'=>'Áo thun','images'=>'1620666980'],
            ['name'=>'Quần đùi','images'=>'1620666912'],
        ]);
    }
}
class productsSeeder extends Seeder{
    public function run()
    {
        DB::table('products')->insert([
            ['name'=>'WEAVE POLO SHIRT - PINK PASTEL','price'=>'180000','sale'=>'165000','images'=>'1620666112','qty'=>'100','category_product_id'=>'5','is_hot'=>'0',
                'description'=>'Chất liệu: Cotton Supima
                - Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.
                - Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.'],
            ['name'=>'DENIM JACKET - LIGHT BLUE','price'=>'780000','sale'=>'615000','images'=>'1620665953','qty'=>'100','category_product_id'=>'4','is_hot'=>'0',
                'description'=>'- Chất vải Denim được xử lý kỹ càng, chú trọng từng đường may sao cho chiếc áo khoác chắc chắn, bền màu là giữ được form lâu nhất có thể.
                - Dáng áo đứng form tạo nên vẻ trẻ trung, phong cách, vừa giữ ấm tốt, vừa tránh nắng kỹ.'],
            ['name'=>'PIMA POLO SHIRT - COFFEE','price'=>'80000','sale'=>'65000','images'=>'1620666011','qty'=>'100','category_product_id'=>'5','is_hot'=>'0',
                'description'=>'Chất liệu: Cotton Supima
                - Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.
                - Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.'],
            ['name'=>'LINEN STAND-UP COLLAR SHIRT','price'=>'180000','sale'=>'165000','images'=>'1620665903','qty'=>'100','category_product_id'=>'3','is_hot'=>'0',
                'description'=>'Chất liệu: Vải Linen (Đũi)
                - Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.
                - Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.'],
            ['name'=>'SƠ MI KAKI DENIM - XANH NHẠT','price'=>'180000','sale'=>'165000','images'=>'1620666058','qty'=>'100','category_product_id'=>'3','is_hot'=>'0',
                'description'=>'Chất liệu: Vải Linen (Đũi)
                - Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.
                - Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.'],
            ['name'=>'PORTOFINO LINEN SHIRT - DARK GREEN','price'=>'165000','sale'=>null,'images'=>'1620666568','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'Chất liệu: Vải Linen (Đũi)
                - Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.
                - Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.'],
            ['name'=>'PLAID FLANNEL SHIRT - BLUE','price'=>'615000','sale'=>null,'images'=>'1620666643','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'Chất liệu: Vải Linen (Đũi)
                - Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.
                - Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.'],
            ['name'=>'SLIM FIT POLO SHIRT - NAVY BLUE','price'=>'65000','sale'=>null,'images'=>'1620666495','qty'=>'100','category_product_id'=>'5','is_hot'=>'1',
                'description'=>'Chất liệu: Cotton Supima
                - Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.
                - Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.'],
            ['name'=>'CONTRAST NECKLINE TSHIRT - ORANGE','price'=>'165000','sale'=>null,'images'=>'1620666589','qty'=>'100','category_product_id'=>'5','is_hot'=>'1',
                'description'=>'Chất liệu: Cotton Supima
                - Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.
                - Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.'],
            ['name'=>'PORTOFINO LINEN SHIRT - NAVY BLUE','price'=>'165000','sale'=>null,'images'=>'1620666545','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'Chất liệu: Vải Linen (Đũi)
                - Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.
                - Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.'],
            ['name'=>'BERMUDA SHORT - BLACK','price'=>'180000','sale'=>null,'images'=>'1620667097','qty'=>'100','category_product_id'=>'6','is_hot'=>'0',
                'description'=>'Mẫu quần short Bermuda được làm từ chất liệu làm mát, dòng vải kaki gió với thiết kế ôm tự nhiên, mang đến cho bạn trải nghiệm thoải mái vượt trội.
                - Sợi vải siêu mảnh, nhanh chóng khô mồ hôi ngay tức thì.
                - Thoáng khí tuyệt vời, không còn cảm giác ngột ngạt và mùi mồ hôi khó chịu.'],
            ['name'=>'ÁO VESTON HỌA TIẾT - XÁM CARO','price'=>'1100000','sale'=>null,'images'=>'1620667140','qty'=>'100','category_product_id'=>'1','is_hot'=>'0',
                'description'=>'Chất liệu: 70% polyester, 30% rayon.
                Đặc tính: Mềm mịn, có độ rũ, thấm hút mồ hôi rất tốt, bền màu cao.'],
            ['name'=>'QUẦN KAKI MUSLAND - XANH NAVY','price'=>'380000','sale'=>null,'images'=>'1620667161','qty'=>'100','category_product_id'=>'2','is_hot'=>'0',
                'description'=>'- Chất liệu: 98% cotton, 2% Spandex
                - Co giãn, hút ẩm tốt và thấm hút mồ hôi.
                - Chất vải sờ mịn không bai, không nhăn, không xù.'],
        ]);
    }
}
class usersSeeder extends Seeder{
    public function run()
    {
        $password = bcrypt('016957450392010');
        DB::table('users')->insert([
            ['id' => '1','user_name' => 'admin','email' => 'nguyenvanphi31@gmail.com','phone' => '0395745039','address'=> 'Huế, Việt Nam','avatar'=>'1621353765','password' => $password,'role_id' => '1'],
            ['id' => '2','user_name' => 'user','email' => '17T1021197@husc.edu.vn','phone' => '0395745039','address'=> 'Huế, Việt Nam','avatar'=>null,'password' => $password,'role_id' => '2'],
        ]);
    }
}
class imagesproductsSeeder extends Seeder{
    public function run()
    {
        DB::table('imagesproducts')->insert([
            ['product_id' => '13','images' => '1620874510'],
            ['product_id' => '13','images' => '1620874539'],
            ['product_id' => '8','images' => '1620874570'],
            ['product_id' => '2','images' => '1620874611'],
            ['product_id' => '2','images' => '1620874641'],
            ['product_id' => '3','images' => '1620874683'],
            ['product_id' => '1','images' => '1620874742'],
            ['product_id' => '1','images' => '1620874801'],
        ]);
    }
}
class attributesSeeder extends Seeder{
    public function run()
    {
        DB::table('attributes')->insert([
            ['name' => 'Size'],
        ]);
    }
}
class attributevaluesSeeder extends Seeder{
    public function run()
    {
        DB::table('attributevalues')->insert([
            ['attribute_id' => '1','product_id'=>'1','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'1','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'1','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'1','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'2','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'2','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'2','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'2','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'3','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'3','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'3','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'3','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'4','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'4','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'4','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'4','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'5','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'5','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'5','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'5','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'6','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'6','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'6','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'6','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'7','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'7','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'7','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'7','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'8','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'8','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'8','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'8','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'9','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'9','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'9','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'9','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'10','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'10','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'10','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'10','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'11','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'11','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'11','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'11','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'12','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'12','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'12','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'12','value'=>'XL'],
            ['attribute_id' => '1','product_id'=>'13','value'=>'S'],
            ['attribute_id' => '1','product_id'=>'13','value'=>'M'],
            ['attribute_id' => '1','product_id'=>'13','value'=>'L'],
            ['attribute_id' => '1','product_id'=>'13','value'=>'XL'],
        ]);
    }
}
class statusordersSeeder extends Seeder{
    public function run()
    {
        DB::table('statusorders')->insert([
            ['name' => 'Đang chờ'],
            ['name' => 'Đang vận chuyển'],
            ['name' => 'Hoàn thành'],
            ['name' => 'Đã huỷ'],
            ['name' => 'Giao không thành công'],
        ]);
    }
}
class infosSeeder extends Seeder{
    public function run()
    {
        DB::table('infos')->insert([
            ['name'=>'Nguyễn Văn Phi','web_name'=>'The Gmen','address'=>'95 Mai Thúc Loan, Thành phố Huế',
            'phone'=>'0395745039','email'=>'gmenshop@gmail.com','link_fb'=>'https://www.facebook.com/Thegmenstore/',
            'link_ytb'=>'https://www.youtube.com/channel/UC08RVXMZgiLs3IaV5wj-yIg','link_in'=>'https://www.instagram.com/the_gmen_store/'],
        ]);
    }
}