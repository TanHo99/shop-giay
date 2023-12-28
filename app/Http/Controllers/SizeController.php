<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SizeController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_size(){
        $this->AuthLogin();
        return view('admin.add_size');
    }
    public function all_size(){
        $this->AuthLogin();
        $all_size = DB::table('sanpham_size')->get();
        $manager_size = view('admin.all_size')->with('all_size', $all_size);
        return view('admin_layout')->with('admin.all_size', $manager_size);
    }
    public function save_size(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['size_ten']=$request->size_name;


        DB::table('sanpham_size')->insert($data);
        Session::put('message','Thêm size thành công');
        return redirect::to('all-size');
    }

    public function edit_size($size_id){
        $this->AuthLogin();
        $edit_size = DB::table('sanpham_size')->where('size_id',$size_id)->get();
        $manager_size = view('admin.edit_size')->with('edit_size', $edit_size);
        return view('admin_layout')->with('admin.edit_size', $manager_size);
    }
    public function update_size(Request $request, $size_id){
        $this->AuthLogin();
        $data = array();
        $data['size_ten'] = $request->size_name;

        DB::table('sanpham_size')->where('size_id',$size_id)->update($data);
        Session::put('message','Cập nhât size thành công');
        return Redirect::to('all-size');
    }
    public function delete_size($size_id){
        $this->AuthLogin();
        DB::table('sanpham_size')->where('size_id',$size_id)->delete();
        Session::put('message','Xóa size thành công');
        return Redirect::to('all-size');
    }
}
