<?php

namespace App\Http\Controllers;

use Faker\Core\Color;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ColorController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_color(){
        $this->AuthLogin();
        return view('admin.add_color');
    }
    public function all_color(){
        $this->AuthLogin();
        $all_color = DB::table('sanpham_mau')->get();
        $manager_color = view('admin.all_color')->with('all_color', $all_color);
        return view('admin_layout')->with('admin.all_color', $manager_color);
    }
    public function save_color(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['mau_ten']=$request->color_name;


        DB::table('sanpham_mau')->insert($data);
        Session::put('message','Thêm màu thành công');
        return redirect::to('all-color');
    }

    public function edit_color($color_id){
        $this->AuthLogin();
        $edit_color = DB::table('sanpham_mau')->where('mau_id',$color_id)->get();
        $manager_color = view('admin.edit_color')->with('edit_color', $edit_color);
        return view('admin_layout')->with('admin.edit_color', $manager_color);
    }
    public function update_color(Request $request, $color_id){
        $this->AuthLogin();
        $data = array();
        $data['mau_ten'] = $request->color_name;

        DB::table('sanpham_mau')->where('mau_id',$color_id)->update($data);
        Session::put('message','Cập nhât màu thành công');
        return Redirect::to('all-color');
    }
    public function delete_color($color_id){
        $this->AuthLogin();
        DB::table('sanpham_mau')->where('mau_id',$color_id)->delete();
        Session::put('message','Xóa màu thành công');
        return Redirect::to('all-color');
    }
}
