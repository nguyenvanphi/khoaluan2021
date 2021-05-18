<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'order_id','user_id','money','note','vn_response_code','code_vnpay','code_bank','time'
    ];
}
