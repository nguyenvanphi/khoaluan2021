<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // User
    public function login(){
        return view('frontend.pages.login');
    } 
    public function register(){
        return view('frontend.pages.register');
    } 
    public function forgetpassword(){
        return view('frontend.pages.forgetpassword');
    }
    public function resetpassword(){
        return view('frontend.pages.resetpassword');
    }
    public function about(){
        return view('frontend.pages.about');
    } 

    public function contact(){
        if (\View::exists('frontend.pages.contact')) {
            return view('frontend.pages.contact');
        }
        return abort('404');
        // return view('pages.contact');
    }
    public function cart(){
        return view('frontend.pages.cart');
    }
    public function checkout(){
        return view('frontend.pages.checkout');
    }
    public function thanks(){
        return view('frontend.pages.thanks');
    }
    public function singleproduct(){
        return view('frontend.pages.singleproduct');
    } 
    public function history(){
        return view('frontend.pages.historyorders');
    }
    public function profile(){
        return view('frontend.pages.profile');
    }
    public function vnpay(){
        return view('frontend.pages.vnpay.index');
    }
    // Admin
    public function dashboard(){
        return view('backend.pages.dashboard');
    }
    public function member(){
        return view('backend.pages.member');
    }
    public function categoryproduct(){
        return view('backend.pages.categoryproduct');
    }

    public function addcategoryproduct(){
        return view('backend.pages.addcategoryproduct');
    }

    public function addproducts(){
        return view('backend.pages.addproduct');
    }

}
