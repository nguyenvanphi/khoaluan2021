<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data_sale = DB::table('products')
                    ->where([['sale','<>',null],['is_del','<>','1']])
                    ->get();
        $data_hot = DB::table('products')
                    ->where([['is_hot','=','1'],['is_del','<>','1']])
                    ->get();
        return view('frontend.home',['products_sale'=>$data_sale,'products_hot'=>$data_hot]);
    }

    public function dashboard(){
        $member = DB::table('users')
            ->select('users.*')
            ->get();
        $product = DB::table('products')
            ->select('products.*')
            ->get();
        $category = DB::table('categoryproducts')
            ->select('categoryproducts.*')
            ->get();
        $order = DB::table('orders')
            ->select('orders.*')
            ->get();
        return view('backend.pages.dashboard',['member'=>count($member),'product'=>count($product),
            'category'=>count($category),'order'=>count($order)]);
    }
}
