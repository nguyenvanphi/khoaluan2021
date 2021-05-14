<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $cart = array();
        return view('frontend.pages.cart');
    }

    public function addcart(Request $request){
        $id_product = $request->id;
        $attribute_id = DB::table('attributevalues')
            ->select('attribute_id')
            ->Where('product_id','=',$id_product)
            ->groupBy('attribute_id')
            ->get();
        $attribute_name = array();
        foreach($attribute_id as $at_id){
            $attributes = DB::table('attributes')
            ->select('name')
            ->Where('id','=',$at_id->attribute_id)
            ->get();
            foreach($attributes as $item){
                $attribute_name[] = $item->name;
            }
        }
        $attribute = array();
        foreach($attribute_name as $name){
            $attribute[] = $request->$name;
        }
        if(session('cart')){
            $cart = session()->get('cart');
            session()->forget('cart');
            $product = ['id'=>$id_product,'attribute'=>$attribute,'qty'=>$request->qty];
            $cart[] = $product;
            session()->put('cart',$cart);
        }else{
            $cart = array();
            $product = ['id'=>$id_product,'attribute'=>$attribute,'qty'=>$request->qty];
            $cart[] = $product;
            session()->put('cart',$cart);
        }
        $number = 0;
        foreach(session('cart') as $item){
            $number = $number + $item['qty'];
        }
        // session()->put('cart',array(['id'=>'1','qty'=>'8'],['id'=>'2','qty'=>'8']));
        // dd(session('cart'));
        return response()->json(['success' => 'Data Update successfully.','number'=> $number]);
    }

}
