<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $phone = $request['phone'];
        $password = $request['password'];
        if(Auth::attempt(['phone' => $phone, 'password' => $password])){
            $role = Auth::user()->role_id;
            $result = DB::table('roles')->where('id',$role)->first();
            // $result = DB::table('roles')->where('id',$role)->get(); thi co the dung print_r($result);
            // echo '<pre>';
            // echo $result->name;
            // print_r($result);
            // echo '</pre>';
            // if($result){
            //     session()->put('user_name',Auth::user()->user_name);
            //     // Session::put('user_name',$result->user_name);
            //     echo session('user_name');
                if($result->name==='admin')
            // return view('backend.pages.dashboard');
                    return redirect('/dashboard');
                else
                    return redirect('/');
            // }
            
        }else{
            $value = array();
            if(empty($phone)){
                $value = array_add($value,'phone','Vui lòng nhập số điện thoại');
            }
            if(empty($password)){
                $value = array_add($value,'password','Mật khẩu không được để trống');
            }
            if(!empty($phone)&&!empty($password)){
                $value = array_add($value,'messeger','Thông tin đăng nhập không chính xác');
            }
            return redirect('/login')->with('error',$value);
            // return redirect('/login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
