<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {   
        if(empty($request->all())||$request->search_product==null){
            $products = DB::table('products')
            ->Where('is_del','=','0')
            ->paginate(8);
            $from = $products->firstItem();
            $to = $products->lastItem();
            return view('frontend.pages.shop')->with(compact('products','from','to'));
        }else{
            $products = DB::table('products')
            ->Join('categoryproducts','products.category_product_id','=','categoryproducts.id')
            ->select('products.*')
            ->Where('products.name','like','%'.$request->search_product.'%')
            ->orWhere('categoryproducts.name','like','%'.$request->search_product.'%')
            ->paginate(8);
            $from = $products->firstItem();
            $to = $products->lastItem();
            $search = $request->search_product;
            return view('frontend.pages.shop')->with(compact('products','from','to','search'));
        }
       
    }
}
