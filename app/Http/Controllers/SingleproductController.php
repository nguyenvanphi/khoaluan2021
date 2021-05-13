<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Imagesproduct;
use Illuminate\Support\Facades\DB;

class SingleproductController extends Controller
{
    public function index($id)
    {
        $product = Products::find($id);
        $imagesproduct = DB::table('imagesproducts')
        ->select('*')
        ->Where('product_id','=',$id)
        ->get();;
        return view('frontend.pages.singleproduct',['product'=>$product,'imagesproduct'=>$imagesproduct]);
    }
}

