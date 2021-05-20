<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Orderdetails_attribute;
use App\Models\Products;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vnp_TxnRef = Carbon::now()->timestamp; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpayreturn'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRETVNP')) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRETVNP') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
       return redirect($vnp_Url);
    }

    public function back(){
        session()->forget('info_order');
        return redirect('/order');
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
        if($request->vnp_ResponseCode=='00'&& session('info_order')){
            $time = array();
            $time[] = substr($request->vnp_PayDate, 0, 4);
            for($i = 4;$i < 14;$i){
                $time[] = substr($request->vnp_PayDate, $i, 2);
                $i = $i +2;
            }
            $date = $time[0].'-'.$time[1].'-'.$time[2].' '.$time[3].':'.$time[4].':'.$time[5];
            $data_order = array();
            $data_order = array(
                'user_id' => Auth::user()->id,
                'is_pay' => 1,
                'full_name' => session('info_order')['name'],
                'email'=> session('info_order')['email'],
                'phone'=> session('info_order')['phone'],
                'address' => session('info_order')['address'],
                'total' => session('info_order')['total'],
            );
            $id_order = DB::table('orders')->insertGetId($data_order);
            $cart = session()->get('cart');
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
            
            $payment = array();
            $payment = array(
                'order_id' => $id_order,
                'user_id' => Auth::user()->id,
                'money' => session('info_order')['total'],
                'note' => $request->vnp_OrderInfo,
                'vn_response_code' => $request->vnp_ResponseCode,
                'code_vnpay' => $request->vnp_TransactionNo,
                'code_bank' => $request->vnp_BankCode,
                'time'  => $date,
            );
            Payments::create($payment);
            if(session('order')){
                session()->forget('order');
            }
            session()->put('order',$cart);
            session()->forget('cart');
            return redirect('/thanks');
        }else{
            return redirect('/order');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(payments $payments)
    {
        //
    }
}
