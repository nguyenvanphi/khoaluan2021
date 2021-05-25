<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'name_orderdetails' =>  'required',
            'email_orderdetails' =>  'required|email',
            'pay_orderdetails' =>  'required',
            'address_orderdetails' =>  'required',
            'status_orderdetails' =>  'required',
            'phone_orderdetails' =>  'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $data_orderdetails = DB::table('orderdetails')
        ->select('orderdetails.id','orderdetails.product_id')
        ->where('orderdetails.order_id','=',$request->id_orderdetails)
        ->get();
        $dem = 0;
        $total = 0;
        foreach($data_orderdetails as $data_item){
            $qty = 'qty'.$dem;
            $update = array(
                'qty' => $request->$qty
            );
            Orderdetail::whereId($data_item->id)->update($update);
            $dem = $dem + 1;
            $product = Products::findOrFail($data_item->product_id);
            if($product->sale!=null){
                $total = $total + (int)$product->sale*(int)$request->$qty;
            }else{
                $total = $total + (int)$product->price*(int)$request->$qty;
            }
        }
        $update_order = array();
        if($request->status_orderdetails==3){
            $update_order = array(
                'is_pay' => 1,
                'full_name'=> $request->name_orderdetails,
                'email'=> $request->email_orderdetails,
                'address'=> $request->address_orderdetails,
                'total' => $total,
                'status_order_id'=> $request->status_orderdetails
            );
        }else{
            $update_order = array(
                'is_pay' => $request->pay_orderdetails,
                'full_name'=> $request->name_orderdetails,
                'email'=> $request->email_orderdetails,
                'address'=> $request->address_orderdetails,
                'total' => $total,
                'status_order_id'=> $request->status_orderdetails
            );
        }
        
        Order::whereId($request->id_orderdetails)->update($update_order);

        return response()->json(['success' => 'Data Update Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('orderdetails')
        ->select('orderdetails.product_id','orderdetails.order_id','orderdetails.qty')
        ->where('orderdetails.id','=',$id)
        ->first();
        $total_order = Order::findOrFail($data->order_id);
        $product = Products::findOrFail($data->product_id);
        $total = 0;
        if($product->sale!=null){
            $total = (int)$total_order->total - (int)$product->sale*(int)$data->qty;
        }else{
            $total = (int)$total_order->total - (int)$product->price*(int)$data->qty;
        }
        $update_order = array(
            'total' => $total,
        );
        Order::whereId($data->order_id)->update($update_order);
        DB::table('orderdetails_attributes')->where('orderdetails_id', '=', $id)->delete();
        DB::table('orderdetails')->where('id', '=', $id)->delete();
        return response()->json(['success' => 'Delete Data successfully.']);
    }
}
