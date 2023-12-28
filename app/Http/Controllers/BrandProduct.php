<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_brand(){
        $this->AuthLogin();
        return view('admin.add_brand');
    }
    public function all_brand(){
        $this->AuthLogin();
        $all_brand = DB::table('thuonghieu')->get();
        $manager_brand = view('admin.all_brand')->with('all_brand', $all_brand);
        return view('admin_layout')->with('admin.all_brand', $manager_brand);
    }
    public function save_brand(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['thuonghieu_ten']=$request->brand_name;
        $data['thuonghieu_mo_ta']=$request->brand_desc;
        $data['thuonghieu_trang_thai']=$request->brand_status;

        DB::table('thuonghieu')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return redirect::to('add-brand');
    }
    public function unactive_brand($brand_id){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->update(['thuonghieu_trang_thai'=>1]);
        Session::put('message','Không kích hoạt thương hiệu thành công');
        return redirect::to('all-category');
    }
    public function active_brand($brand_id){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->update(['thuonghieu_trang_thai'=>0]);
        Session::put('message','Kích hoạt thương hiệu thành công');
        return redirect::to('all-brand');
    }
    public function edit_brand($brand_id){
        $this->AuthLogin();
        $edit_brand = DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->get();
        $manager_brand = view('admin.edit_brand')->with('edit_brand', $edit_brand);
        return view('admin_layout')->with('admin.edit_brand', $manager_brand);
    }
    public function update_brand(Request $request, $brand_id){
        $this->AuthLogin();
        $data = array();
        $data['thuonghieu_ten'] = $request->brand_name;
        $data['thuonghieu_mo_ta'] = $request->brand_desc;

        DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->update($data);
        Session::put('message','Cập nhât thương hiệu thành công');
        return Redirect::to('all-brand');
    }
    public function delete_brand($brand_id){
        $this->AuthLogin();
        DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->delete();
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect::to('all-brand');
    }

    //end function admin
    public  function  show_brand_home($brand_id){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();

        $brand_by_id = DB::table('sanpham')->join('thuonghieu','sanpham.thuonghieu_id','=','thuonghieu.thuonghieu_id')
            ->where('sanpham.thuonghieu_id',$brand_id)->get();
        $brand_name = DB::table('thuonghieu')->where('thuonghieu.thuonghieu_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
