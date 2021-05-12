<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {   
        $products = Products::paginate(8);
        $from = $products->firstItem();
        $to = $products->lastItem();
        return view('frontend.pages.shop')->with(compact('products','from','to'));
    }
}
