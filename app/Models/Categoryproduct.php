<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoryproduct extends Model
{
    
    protected $table = 'categoryproducts';
    // các trường không được thêm dử liệu
    protected $guarded = [];
    // Các trường được thêm dử liệu vào trong database
    protected $fillable = ['name', 'images'];

    public function getdata(){
        return Categoryproduct::all();
    }
    
}
