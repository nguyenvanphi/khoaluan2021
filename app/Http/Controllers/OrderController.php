<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\Orderdetails_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('frontend.pages.checkout',['dataproduct'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart');
        if($request->pay_method==0){
            $data_order = array();
            $data_order = array(
                'user_id' => Auth::user()->id,
                'full_name' => $request->name_order,
                'email'=> $request->email_order,
                'phone'=> $request->phone_order,
                'address' => $request->address_order,
                'total' => $request->total,
            );
            $id_order = DB::table('orders')->insertGetId($data_order);
            foreach($cart as $item){
                $data_orderdetail = array();
                $data_orderdetail = array(
                    'product_id' => $item['id'],
                    'order_id' => $id_order,
                    'qty' => $item['qty']
                );
                $id_orderdetail = DB::table('orderdetails')->insertGetId($data_orderdetail);
                $attributevalues = DB::table('attributevalues')
                    ->select('*')
                    ->Where('id','=',$item['attribute'][0])
                    ->get();
                foreach($attributevalues as $value){
                    // dd($value->attribute_id);
                    $data = array();
                    $data = array(
                        'attribute_id' => $value->attribute_id,
                        'orderdetails_id' => $id_orderdetail,
                        'value' => $value->value
                    );
                    Orderdetails_attribute::create($data);
                }
            }
            if(session('order')){
                session()->forget('order');
            }
            session()->put('order',$cart);
            $info_order = array(
                'name' => $request->name_order,
                'email' => $request->email_order,
                'phone' => $request->phone_order,
                'address' => $request->address_order,
            );
            session()->put('info_order',$info_order);
            session()->forget('cart');
            return response()->json(['success' => 'Add order successfully.']);
        }else{
            dd('test');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $Order)
    {
        //
    }

    public function thanks()
    {
        $info_order = session()->get('info_order');
        session()->forget('info_order');
        $order = array();
        foreach(session('order') as $item){
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
            $order[]=['product'=>$product,'attribute'=>$attribute,'qty'=>$item['qty']];
        }
        session()->forget('order');
        return view('frontend.pages.thanks',['info_order'=>$info_order,'order'=>$order]);
    }
}
