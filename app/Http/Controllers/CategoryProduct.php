<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_category(){
        $this->AuthLogin();
        return view('admin.add_category');
    }
    public function all_category(){
        $this->AuthLogin();
        $all_category = DB::table('danhmuc')->get();
        $manager_category = view('admin.all_category')->with('all_category', $all_category);
        return view('admin_layout')->with('all_category', $manager_category);
    }
    public function save_category(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['danhmuc_ten']=$request->category_name;
        $data['danhmuc_mo_ta']=$request->category_desc;
        $data['danhmuc_trang_thai']=$request->category_status;

        DB::table('danhmuc')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return redirect::to('add-category');
    }
    public function unactive_category($cate_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('danhmuc_id',$cate_id)->update(['danhmuc_trang_thai'=>1]);
        Session::put('message','Không kích hoạt danh mục thành công');
        return redirect::to('all-category');
    }
    public function active_category($cate_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('danhmuc_id',$cate_id)->update(['danhmuc_trang_thai'=>0]);
        Session::put('message','Kích hoạt danh mục thành công');
        return redirect::to('all-category');
    }
    public function edit_category($cate_id){
        $this->AuthLogin();
        $edit_category = DB::table('danhmuc')->where('danhmuc_id',$cate_id)->get();
        $manager_category = view('admin.edit_category')->with('edit_category', $edit_category);
        return view('admin_layout')->with('admin.edit_category', $manager_category);
    }
    public function update_category(Request $request, $cate_id){
        $this->AuthLogin();
        $data = array();
        $data['danhmuc_ten'] = $request->category_name;
        $data['danhmuc_mo_ta'] = $request->category_desc;

        DB::table('danhmuc')->where('danhmuc_id',$cate_id)->update($data);
        Session::put('message','Cập nhât danh mục thành công');
        return Redirect::to('all-category');
    }
    public function delete_category($cate_id){
        $this->AuthLogin();
        DB::table('danhmuc')->where('danhmuc_id',$cate_id)->delete();
        Session::put('message','Xóa nhât danh mục thành công');
        return Redirect::to('all-category');
    }

    //End Function Admin Page
    public  function  show_cate_home($cate_id){
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();

        $cate_by_id = DB::table('sanpham')->join('danhmuc','sanpham.danhmuc_id','=','danhmuc.danhmuc_id')
            ->where('sanpham.danhmuc_id',$cate_id)->get();
        $cate_name = DB::table('danhmuc')->where('danhmuc.danhmuc_id',$cate_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('cate_by_id',$cate_by_id)->with('cate_name',$cate_name);
    }
}
