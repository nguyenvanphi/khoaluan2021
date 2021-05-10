<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    // các trường không được thêm dử liệu
    protected $guarded = [];
    // Các trường được thêm dử liệu vào trong database
    protected $fillable = ['name', 'price','sale','category_product_id','content','images','is_hot','is_del'];

}
