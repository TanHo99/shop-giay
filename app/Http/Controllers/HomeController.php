<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();

        $all_product = DB::table('sanpham')->where('sanpham_trang_thai','0')->orderby('sanpham_id','desc')->limit(4)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
}

