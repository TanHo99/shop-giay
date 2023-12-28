<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SupplierController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_sup(){
        $this->AuthLogin();
        return view('admin.add_sup');
    }
    public function all_sup(){
        $this->AuthLogin();
        $all_sup = DB::table('nhacungcap')->get();
        $manager_sup = view('admin.all_sup')->with('all_sup', $all_sup);
        return view('admin_layout')->with('admin.all_sup', $manager_sup);
    }
    public function save_sup(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['ncc_ten']=$request->sup_name;
        $data['ncc_sdt']=$request->sup_phone;
        $data['ncc_dia_chi']=$request->sup_add;

        DB::table('nhacungcap')->insert($data);
        Session::put('message','Thêm nhà cung cấp thành công');
        return redirect::to('add-sup');
    }
    public function edit_sup($sup_id){
        $this->AuthLogin();
        $edit_sup = DB::table('nhacungcap')->where('ncc_id',$sup_id)->get();
        $manager_sup = view('admin.edit_sup')->with('edit_sup', $sup_id);
        return view('admin_layout')->with('admin.edit_sup', $manager_sup);
    }
    public function update_sup(Request $request, $sup_id){
        $this->AuthLogin();
        $data = array();
        $data['ncc_ten'] = $request->sup_name;
        $data['ncc_sdt'] = $request->sup_phone;
        $data['ncc_dia_chi'] = $request->sup_add;

        DB::table('nhacungcap')->where('ncc_id',$sup_id)->update($data);
        Session::put('message','Cập nhât nhà cung cấp thành công');
        return Redirect::to('all-sup');
    }
    public function delete_sup($sup_id){
        $this->AuthLogin();
        DB::table('nhacungcap')->where('ncc_id',$sup_id)->delete();
        Session::put('message','Xóa nhà cung cấp thành công');
        return Redirect::to('all-sup');
    }
}
