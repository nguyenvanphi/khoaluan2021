<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $cart = array();
        if(session('cart')){
            foreach(session('cart') as $item){
                $product = Products::find($item['id']);
                $attribute = array();
                foreach($item['attribute'] as $item_atr){
                    $attributevalues = DB::table('attributevalues')
                        ->select('*')
                        ->Where('id','=',$item_atr)
                        ->get();
                    foreach($attributevalues as $value){
                        $attributename = DB::table('attributes')
                            ->select('*')
                            ->Where('id','=',$value->attribute_id)
                            ->get();
                        foreach($attributename as $name){
                            $attribute[] = ['attributevalue_id'=>$item_atr,'attributevalue'=>$value->value,'attribute'=>$name->name];
                        }
                    }
                }
                $cart[]=['product'=>$product,'attribute'=>$attribute,'qty'=>$item['qty']];
            }
        }
        return response()->json(['cart'=>$cart]);
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
            $check = 0; $dem = 0;
            foreach($cart as $item){
                if($item['id']==$id_product && !array_diff($attribute,$item['attribute'])){
                    $cart[$dem]['qty'] = $cart[$dem]['qty'] + $request->qty;
                    $check = 1;
                    break;
                }
                $dem++;
            }
            if($check==0){
                $product = ['id'=>$id_product,'attribute'=>$attribute,'qty'=>$request->qty];
                $cart[] = $product;
            }
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

    public function deletecart(){
        session()->forget('cart');
        return response()->json(['success' => 'Delete Cart successfully.']);
    }
    public function deleteproductcart($id,$attribute_id){
        $cart = array();
        $cart2 = array();
        $cart = session()->get('cart');
        $key = 0;
        foreach($cart as $item){
            if($item['id']==$id){
                foreach($item['attribute'] as $item_atr){
                    if($item_atr==$attribute_id){
                        unset($cart[$key]);
                    }else{
                        $cart2[] = $item;
                    }
                }
            }else{
                $cart2[] = $item;
            }
        }
        session()->forget('cart');
        if(count($cart2)>0){
            session()->put('cart',$cart2);
        }
        return response()->json(['success' => 'Delete Product Cart successfully.']);
    }
    public function updatecart(Request $request){
        $cart = array();
        $cart2 = array();
        $cart = session()->get('cart');
        $dem = 0;
        foreach($cart as $item){
            $qty = 'qty'.$dem;
            $product = ['id'=>$item['id'],'attribute'=>$item['attribute'],'qty'=>$request->$qty];
            $cart2[] = $product;
            $dem++;
        }
        session()->forget('cart');
        session()->put('cart',$cart2);
        return response()->json(['success' => 'Delete Cart successfully.']);
    }

}
