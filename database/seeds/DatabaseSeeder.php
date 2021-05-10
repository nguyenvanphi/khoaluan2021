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
        $this->call(usersSeeder::class);
        // $this->call(categoryproductsSeeder::class);
    }
}
class rolesSeeder extends Seeder{
    public function run()
    {
        DB::table('roles')->insert([['id'=>'1','name'=>'admin'],['id'=>'2','name'=>'member']]);
    }
}
class usersSeeder extends Seeder{
    public function run()
    {
        $password = bcrypt('016957450392010');
        $password2 = bcrypt('016957450392010');
        // $active_token = time();
        DB::table('users')->insert([
            ['id' => '1',
            'user_name' => 'admin',
            'email' => 'nguyenvanphi31@gmail.com',
            // 'phone' => '0395745039',
            'password' => $password,
            // 'avatar'=> 'admin.jpg',
            'role_id' => '1',
            // 'is_active' => '1',
            // 'active_token' => $active_token,
            'address'=> 'Huế, Việt Nam'],
            ['id' => '2',
            'user_name' => 'user',
            'email' => '17T1021197@husc.edu.vn',
            // 'phone' => '0346194731',
            'password' => $password2,
            // 'avatar'=> 'admin.jpg',
            'role_id' => '2',
            // 'is_active' => '1',
            // 'active_token' => $active_token,
            'address'=> 'Huế, Việt Nam'],
        ]);
    }
}
// class categoryproductsSeeder extends Seeder{
//     public function run()
//     {
//         DB::table('categoryproducts')->insert([
//             ['id'=>'1','name'=>'Veston','images'=>'categoryproduct.png'],
//             ['id'=>'2','name'=>'Quần kaki','images'=>'categoryproduct.png'],
//             ['id'=>'3','name'=>'Áo sơ mi','images'=>'categoryproduct.png'],
//             ['id'=>'4','name'=>'Veston','images'=>'categoryproduct.png'],
//             ['id'=>'5','name'=>'Quần kaki','images'=>'categoryproduct.png'],
//             ['id'=>'6','name'=>'Áo sơ mi','images'=>'categoryproduct.png'],
//             ['id'=>'7','name'=>'Veston','images'=>'categoryproduct.png'],
//             ['id'=>'8','name'=>'Quần kaki','images'=>'categoryproduct.png'],
//             ['id'=>'9','name'=>'Áo sơ mi','images'=>'categoryproduct.png'],
//             ['id'=>'10','name'=>'Veston','images'=>'categoryproduct.png'],
//             ['id'=>'11','name'=>'Quần kaki','images'=>'categoryproduct.png'],
//             ['id'=>'12','name'=>'Áo sơ mi','images'=>'categoryproduct.png'],
//             ['id'=>'13','name'=>'Áo thun','images'=>'categoryproduct.png']
//         ]);
//     }
// }