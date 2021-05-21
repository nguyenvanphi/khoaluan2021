<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\Order;
use App\Models\Products;
use App\Models\Orderdetail;
use App\Models\Orderdetails_attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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

    public function indexadmin(){
        if(request()->ajax())
        {
            $data = DB::table('orders')
                    ->select('orders.*')
                    ->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger deleteorder" id="'.$data->id.'" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>';
                        $button .= '<a href="/shopthegmen/editorder/'.$data->id.'/edit" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-eye"></i> Xem</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.pages.orders');
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
            $total = 0;
            foreach($cart as $item){
                $product = Products::find($item['id']);
                $qty_update = (int)$product['qty']-(int)$item['qty'];
                if($qty_update>0){
                    $update = array(
                        'qty' => $qty_update,
                    );
                    Products::whereId($item['id'])->update($update);
                }else{
                    $update = array(
                        'qty' => 0,
                        'is_del' => 1,
                    );
                    Products::whereId($item['id'])->update($update);
                }
                if($product['sale']==null){
                    $total = $total + $product['price']*$item['qty'];
                }else{
                    $total = $total + $product['sale']*$item['qty'];
                }
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
                'total' => $total
            );
            session()->put('info_order',$info_order);
            session()->forget('cart');
            return response()->json(['success' => 0]);
        }else{
            $total = 0;
            foreach($cart as $item){
                $product = Products::find($item['id']);
                if($product['sale']==null){
                    $total = $total + $product['price']*$item['qty'];
                }else{
                    $total = $total + $product['sale']*$item['qty'];
                }
            }
            $info_order = array();
            $info_order = array(
                'name' => $request->name_order,
                'email' => $request->email_order,
                'phone' => $request->phone_order,
                'address' => $request->address_order,
                'total' => $total
            );
            session()->put('info_order',$info_order);
            return response()->json(['success' => 1]);
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
    public function edit($id)
    {
        $data_product = DB::table('products')->get();
        return view('backend.pages.editorder',['data_product'=>$data_product,'id_order'=>$id]);
    }

    public function loadorder($id){
        $data_order = DB::table('orders')
            ->select('*')
            ->where('id','=',$id)
            ->get();
        $data_orderdetail = DB::table('orderdetails')
            ->join('products','orderdetails.product_id','=','products.id')
            ->join('orderdetails_attributes','orderdetails.id','=','orderdetails_attributes.orderdetails_id')
            ->select('orderdetails.id','orderdetails.qty','orderdetails.order_id','orderdetails.product_id','products.name','products.price','products.sale','products.images','orderdetails_attributes.value')
            ->where('orderdetails.order_id','=',$id)
            ->get();
        return response()->json(['data_order'=>$data_order,'data_order_details'=>$data_orderdetail]);
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
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order->status_order_id==3){
            $orderdetails = DB::table('orderdetails')
            ->select('orderdetails.*')
            ->Where('order_id','=',$id)
            ->get();
            foreach($orderdetails as $item){
                DB::table('orderdetails_attributes')->where('orderdetails_id', '=', $item->id)->delete();
            }
            DB::table('orderdetails')->where('order_id', '=', $id)->delete();
            if($order->is_pay==1){
                DB::table('payments')->where('order_id', '=', $id)->delete();
            }
            DB::table('orders')->where('id', '=', $id)->delete();
            return response()->json(['success' => 'Delete Data successfully.']);
        }else{
            $orderdetails = DB::table('orderdetails')
            ->select('orderdetails.*')
            ->Where('order_id','=',$id)
            ->get();
            foreach($orderdetails as $item){
                $data_products = DB::table('products')
                ->select('products.*')
                ->Where('id','=',$item->product_id)
                ->get();
                foreach($data_products as $data_product){
                    $qty = (int)$item->qty + (int)$data_product->qty;
                    $product = array(
                        'qty' => $qty,
                    );
                    Products::whereId($item->product_id)->update($product);
                }
                DB::table('orderdetails_attributes')->where('orderdetails_id', '=', $item->id)->delete();
            }
            DB::table('orderdetails')->where('order_id', '=', $id)->delete();
            if($order->is_pay==1){
                DB::table('payments')->where('order_id', '=', $id)->delete();
            }
            DB::table('orders')->where('id', '=', $id)->delete();
            return response()->json(['success' => 'Delete Data successfully.']);
        }
    }

    public function thanks()
    {
        $info_order = session()->get('info_order');
        $data = array(
            'name'      =>  $info_order['name'],
            'email'     => $info_order['email'],
            'phone'   => $info_order['phone'],
            'address'   =>   $info_order['address'],
            'total' => $info_order['total']
        );
        Mail::to('17T1021197@husc.edu.vn')->send(new NewOrder($data));
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

    public function history(){
        $order = DB::table('orders')
        ->Join('statusorders','orders.status_order_id','=','statusorders.id')
        ->select('orders.*','statusorders.name as name')
        ->Where('user_id','=',Auth::user()->id)
        ->paginate(5);
        $from = $order->firstItem();
        $to = $order->lastItem();
        return view('frontend.pages.historyorders')->with(compact('order','from','to'));
    }

    public function detailhistory($id){
        $order = DB::table('orders')
        ->Join('statusorders','orders.status_order_id','=','statusorders.id')
        ->select('orders.*','statusorders.name as name')
        ->Where([['user_id','=',Auth::user()->id],['orders.id','=',$id]])
        ->get();
        $products = DB::table('orders')
        ->Join('orderdetails','orders.id','=','orderdetails.order_id')
        ->Join('products','orderdetails.product_id','=','products.id')
        ->Join('orderdetails_attributes','orderdetails.id','=','orderdetails_attributes.orderdetails_id')
        ->Join('attributes','orderdetails_attributes.attribute_id','=','attributes.id')
        ->select('orderdetails.*','products.name as name_product','orderdetails_attributes.value as value','attributes.name as name_attr','products.images')
        ->Where([['orders.user_id','=',Auth::user()->id],['orders.id','=',$id]])
        ->get();
        return view('frontend.pages.detailsorder',['order'=>$order,'products'=>$products]);
    }

    public function addproductorder(Request $request){
        $rules = array(
            'product' =>  'required',
            'size'  => 'required',
            'qty_product' =>  'required|numeric|min:1'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $datachecks = DB::table('orderdetails')
            ->join('orderdetails_attributes','orderdetails.id','=','orderdetails_attributes.orderdetails_id')
            ->select('orderdetails.id','orderdetails.qty')
            ->where([['orderdetails.order_id','=',$request->id_order],['orderdetails.product_id','=',$request->product],['orderdetails_attributes.value','=',$request->size]])
            ->get();
        if(count($datachecks)>0){
            foreach($datachecks as $datacheck){
                $qty = (int)$request->qty_product + (int)$datacheck->qty;
                $update = array(
                    'qty' => $qty,
                );
                Orderdetail::whereId($datacheck->id)->update($update);
            }
        }else{
            $data_orderdetails = array(
                'product_id' => $request->product,
                'order_id'  => $request->id_order,
                'qty' => $request->qty_product
            );
            $id_orderdetails = DB::table('orderdetails')->insertGetId($data_orderdetails);
            $data_orderdetailvalue = array(
                'attribute_id' => 1,
                'value' => $request->size,
                'orderdetails_id' => $id_orderdetails
            );
            Orderdetails_attribute::create($data_orderdetailvalue);
        }
        
        $total_order = Order::findOrFail($request->id_order);
        $product = Products::findOrFail($request->product);
        $total = 0;
        if($product->sale!=null){
            $total = (int)$total_order->total + (int)$product->sale*(int)$request->qty_product;
        }else{
            $total = (int)$total_order->total + (int)$product->price*(int)$request->qty_product;
        }
        $update_order = array(
            'total' => $total,
        );
        Order::whereId($request->id_order)->update($update_order);

        return response()->json(['success' => 'Data Add Successfully.']);
    }
}
