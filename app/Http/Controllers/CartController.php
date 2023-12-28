<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public  function save_cart(Request $request){
//        dd($request->input());
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('sanpham')->where('sanpham_id',$productId)->first();
        $product_ct = DB::table('sanpham_ct')->join('sanpham_mau','sanpham_ct.mau_id','=','sanpham_mau.mau_id')
                        ->join('sanpham_size','sanpham_ct.size_id','=','sanpham_size.size_id')
                        ->where([
                            'sanpham_id' => $productId,
                            'sanpham_ct.mau_id' => $request->color,
                            'sanpham_ct.size_id' => $request->size
                        ])
                        ->select('sanpham_ct.sanpham_ct_id','sanpham_size.size_ten','sanpham_mau.mau_ten')
                        ->first();
//        dd($request->input(),$product_ct);
        if(!$product_ct){
            return Redirect::to('/details_product');
        }
        $data['id'] = $product_ct->sanpham_ct_id;
//        $data['color'] = $product_ct->mau_ten;
//        $data['size'] = $product_ct->size_ten;
        $data['sanpham_id'] = $productId;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->sanpham_ten;
        $data['price'] = $product_info->sanpham_gia;
        $data['options']['color'] = $product_ct->mau_ten;
        $data['options']['size'] = $product_ct->size_ten;
        $data['options']['image'] = $product_info->sanpham_hinh;
        Cart::add($data);
//        dd(Cart::content());
//        Cart::add('293ad', 'Product 1', 1, 9.99);
//        Cart::destroy();
        return Redirect::to('/show-cart');
    }

    public function show_cart(){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId){
       Cart::update($rowId,0);

        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);

        return Redirect::to('/show-cart');
    }
}
