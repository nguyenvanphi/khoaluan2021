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
        if(session('info_order')){
            session()->forget('info_order');
        }
        $product = Products::find($id);
        $imagesproduct = DB::table('imagesproducts')
            ->select('*')
            ->Where('product_id','=',$id)
            ->get();
        $attributevalues = DB::table('attributevalues')
            ->select('*')
            ->Where('product_id','=',$id)
            ->get();
        $attribute_id = DB::table('attributevalues')
            ->select('attribute_id')
            ->Where('product_id','=',$id)
            ->groupBy('attribute_id')
            ->get();
        $attribute_name = array();
        foreach($attribute_id as $at_id){
            $attributes = DB::table('attributes')
            ->select('name')
            ->Where('id','=',$at_id->attribute_id)
            ->get();
            foreach($attributes as $item){
                $attribute_name[] = ['id'=>$at_id->attribute_id,'name'=>$item->name];
            }
        }
        return view('frontend.pages.singleproduct',
                ['product'=>$product,'imagesproduct'=>$imagesproduct,
                'attributevalues'=>$attributevalues,'attribute_name'=>$attribute_name]);
    }
}

