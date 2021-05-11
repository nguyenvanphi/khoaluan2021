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
        $this->call(usersSeeder::class);
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
                'description'=>'<p>Chất liệu: Cotton Supima</p><p>- Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.</p><p>- Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.</p>'],
            ['name'=>'DENIM JACKET - LIGHT BLUE','price'=>'780000','sale'=>'615000','images'=>'1620665953','qty'=>'100','category_product_id'=>'4','is_hot'=>'0',
                'description'=>'<p>- Chất vải Denim được xử lý kỹ càng, chú trọng từng đường may sao cho chiếc áo khoác chắc chắn, bền màu là giữ được form lâu nhất có thể.</p><p>- Dáng áo đứng form tạo nên vẻ trẻ trung, phong cách, vừa giữ ấm tốt, vừa tránh nắng kỹ.</p>'],
            ['name'=>'PIMA POLO SHIRT - COFFEE','price'=>'80000','sale'=>'65000','images'=>'1620666011','qty'=>'100','category_product_id'=>'5','is_hot'=>'0',
                'description'=>'<p>Chất liệu: Cotton Supima</p><p>- Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.</p><p>- Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.</p>'],
            ['name'=>'LINEN STAND-UP COLLAR SHIRT','price'=>'180000','sale'=>'165000','images'=>'1620665903','qty'=>'100','category_product_id'=>'3','is_hot'=>'0',
                'description'=>'<p>Chất liệu: Vải Linen (Đũi)</p><p>- Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.</p><p>- Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.</p>'],
            ['name'=>'SƠ MI KAKI DENIM - XANH NHẠT','price'=>'180000','sale'=>'165000','images'=>'1620666058','qty'=>'100','category_product_id'=>'3','is_hot'=>'0',
                'description'=>'<p>Chất liệu: Vải Linen (Đũi)</p><p>- Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.</p><p>- Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.</p>'],
            ['name'=>'PORTOFINO LINEN SHIRT - DARK GREEN','price'=>'165000','sale'=>null,'images'=>'1620666568','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'<p>Chất liệu: Vải Linen (Đũi)</p><p>- Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.</p><p>- Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.</p>'],
            ['name'=>'PLAID FLANNEL SHIRT - BLUE','price'=>'615000','sale'=>null,'images'=>'1620666643','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'<p>Chất liệu: Vải Linen (Đũi)</p><p>- Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.</p><p>- Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.</p>'],
            ['name'=>'SLIM FIT POLO SHIRT - NAVY BLUE','price'=>'65000','sale'=>null,'images'=>'1620666495','qty'=>'100','category_product_id'=>'5','is_hot'=>'1',
                'description'=>'<p>Chất liệu: Cotton Supima</p><p>- Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.</p><p>- Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.</p>'],
            ['name'=>'CONTRAST NECKLINE TSHIRT - ORANGE','price'=>'165000','sale'=>null,'images'=>'1620666589','qty'=>'100','category_product_id'=>'5','is_hot'=>'1',
                'description'=>'<p>Chất liệu: Cotton Supima</p><p>- Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.</p><p>- Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.</p>'],
            ['name'=>'PORTOFINO LINEN SHIRT - NAVY BLUE','price'=>'165000','sale'=>null,'images'=>'1620666545','qty'=>'100','category_product_id'=>'3','is_hot'=>'1',
                'description'=>'<p>Chất liệu: Vải Linen (Đũi)</p><p>- Nhẹ nhàng, mềm mai, thoáng mát, độ co giãn nhẹ.</p><p>- Chất liệu linen cao cấp đã qua xử lý chống co rút, bai nhão.</p>'],
            ['name'=>'BERMUDA SHORT - BLACK','price'=>'180000','sale'=>null,'images'=>'1620667097','qty'=>'100','category_product_id'=>'6','is_hot'=>'0',
                'description'=>'<p>Mẫu quần short Bermuda được làm từ chất liệu làm mát, dòng vải kaki gió với thiết kế ôm tự nhiên, mang đến cho bạn trải nghiệm thoải mái vượt trội.</p><p>- Sợi vải siêu mảnh, nhanh chóng khô mồ hôi ngay tức thì.</p><p>- Thoáng khí tuyệt vời, không còn cảm giác ngột ngạt và mùi mồ hôi khó chịu.</p>'],
            ['name'=>'ÁO VESTON HỌA TIẾT - XÁM CARO','price'=>'1100000','sale'=>null,'images'=>'1620667140','qty'=>'100','category_product_id'=>'1','is_hot'=>'0',
                'description'=>'<p>Chất liệu: 70% polyester, 30% rayon.</p><p>Đặc tính: Mềm mịn, có độ rũ, thấm hút mồ hôi rất tốt, bền màu cao.</p>'],
            ['name'=>'QUẦN KAKI MUSLAND - XANH NAVY','price'=>'380000','sale'=>null,'images'=>'1620667161','qty'=>'100','category_product_id'=>'2','is_hot'=>'0',
                'description'=>'<p>- Chất liệu: 98% cotton, 2% Spandex</p><p>- Co giãn, hút ẩm tốt và thấm hút mồ hôi.</p><p>- Chất vải sờ mịn không bai, không nhăn, không xù.</p>'],
        ]);
    }
}
class usersSeeder extends Seeder{
    public function run()
    {
        $password = bcrypt('016957450392010');
        DB::table('users')->insert([
            ['id' => '1','user_name' => 'admin','email' => 'nguyenvanphi31@gmail.com','phone' => '0395745039','address'=> 'Huế, Việt Nam','password' => $password,'role_id' => '1'],
            ['id' => '2','user_name' => 'user','email' => '17T1021197@husc.edu.vn','phone' => '0395745039','address'=> 'Huế, Việt Nam','password' => $password,'role_id' => '2'],
        ]);
    }
}