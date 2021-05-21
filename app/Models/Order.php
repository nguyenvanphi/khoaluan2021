<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'user_id','is_pay','full_name','email','phone','address','total','status_order_id'
    ];
    // public function status_order(){
    //     return $this->belongsTo('App\Models\Statusorder','statusorder_id');
    // }
}
