<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails_attribute extends Model
{
    protected $fillable = [
        'attribute_id','orderdetails_id','value'
    ];
}
