<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    // các trường không được thêm dử liệu
    protected $guarded = [];
    // Các trường được thêm dử liệu vào trong database
    protected $fillable = ['name', 'price','sale','qty','category_product_id','content','images','is_hot','is_del','description'];

    public function imagesproducts(){
        return $this->hasMany('App\Models\Imagesproduct','product_id');
    }
    public function attribute_value(){
        return $this->hasMany('App\Models\Attributevalue','product_id');
    }
    public function orderdetails(){
        return $this->belongsToMany('App\Models\Orderdetail','product_id');
    }
}
