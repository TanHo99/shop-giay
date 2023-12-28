<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/trang-chu');
    }
    public function login(Request $request){
        $email = $request->email_account;
        $password = md5($request->email_account);
        $result = DB::table('user')->where('user_email',$email)->where('user_password',$password)->get();
        if($result){
            return Redirect('/show-checkout');
        }else{
            return Redirect('/login-checkout');
        }
        session::put('user_id',$result->user_id );
    }
    public function add_user(Request $request){
        $data = array();
        $data['user_email'] = $request->user_email;
        $data['user_password'] = md5($request->user_password);

        $user_id = DB::table('user')->insertgetId($data);
        session::put('user_id',$user_id);
        return Redirect('/show-checkout');
    }
    public function show_checkout(){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
