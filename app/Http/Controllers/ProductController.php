<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else return Redirect::to('admin')->send();
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('danhmuc')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->orderby('thuonghieu_id','desc')->get();
        $sup_product = DB::table('nhacungcap')->orderby('ncc_id','desc')->get();
        $color_product = DB::table('sanpham_mau')->orderby('mau_id','desc')->get();
        $size_product = DB::table('sanpham_size')->orderby('size_id','desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)
            ->with('brand_product',$brand_product)->with('sup_product',$sup_product)
            ->with('color_product',$color_product)->with('size_product',$size_product);

    }
    public function add_product_detail(){
        $this->AuthLogin();
        $products = DB::table('sanpham')->orderby('sanpham_id','desc')->get();
        $color_product = DB::table('sanpham_mau')->orderby('mau_id','desc')->get();
        $size_product = DB::table('sanpham_size')->orderby('size_id','desc')->get();
        return view('admin.add_product_detail')
            ->with([
                'color_product' => $color_product,
                'size_product' => $size_product,
                'products' => $products
            ]);

    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('sanpham')
        ->join('danhmuc','danhmuc.danhmuc_id','=','sanpham.danhmuc_id')
            ->join('thuonghieu','thuonghieu.thuonghieu_id','=','sanpham.thuonghieu_id')
            ->join('nhacungcap','nhacungcap.ncc_id','=','sanpham.ncc_id')
        ->orderby('sanpham.sanpham_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['sanpham_ten']=$request->product_name;
        $data['sanpham_mo_ta']=$request->product_desc;
        $data['danhmuc_id']=$request->product_cate;
        $data['thuonghieu_id']=$request->product_brand;
        $data['ncc_id']=$request->product_sup;
        $data['sanpham_trang_thai']=$request->product_status;
        $data['sanpham_gia']=$request->product_price;
        $data['sanpham_gia_km']=$request->product_price_sale;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['sanpham_hinh'] = $new_image;
        }
//        lưu sản phẩm
        $product_id = DB::table('sanpham')->insertGetId($data);

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $get_image)
            {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = time().$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/upload/product/item',$new_image);
//
                $data_hinh_con = [
                    'sanpham_id' => $product_id,
                    'name' => $new_image,
                ];
                DB::table('sanpham_hinh_item')->insert($data_hinh_con);
            }
        }

        Session::put('message','Thêm sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function save_product_detail(Request $request){
        $this->AuthLogin();
        $data_chitiet = [
            'sanpham_id'        => $request->product_id,
            'mau_id'            => $request->product_color,
            'size_id'           => $request->product_size,
            'sanpham_ct_sl'     => $request->product_quality
        ];
//                lưu chi tiết sản phẩm
        DB::table('sanpham_ct')->insert($data_chitiet);

        Session::put('message','Thêm sản phẩm thành công');
        return redirect::to('add-product-detail');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('sanpham')->where('sanpham_id',$product_id)->update(['sanpham_trang_thai'=>1]);
        Session::put('message','Kích hoạt trạng thái hết hàng');
        return redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('sanpham')->where('sanpham_id',$product_id)->update(['sanpham_trang_thai'=>0]);
        Session::put('message','Kích hoạt trạng thái còn hàng');
        return redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('danhmuc')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->orderby('thuonghieu_id','desc')->get();
        $sup_product = DB::table('nhacungcap')->orderby('ncc_id','desc')->get();
        $color_product = DB::table('sanpham_mau')->orderby('mau_id','desc')->get();
        $size_product = DB::table('sanpham_size')->orderby('size_id','desc')->get();
//        $edit_product = DB::table('sanpham')
//            ->join('danhmuc','danhmuc.danhmuc_id','=','sanpham.danhmuc_id')
//            ->join('thuonghieu','thuonghieu.thuonghieu_id','=','sanpham.thuonghieu_id')
//            ->join('nhacungcap','nhacungcap.ncc_id','=','sanpham.ncc_id')
//            ->join('sanpham_hinh_item','sanpham_hinh_item.sanpham_id','=','sanpham.sanpham_id')
//            ->join('sanpham_ct','sanpham_ct.sanpham_id','=','sanpham.sanpham_id')
//            ->where('sanpham_id',$product_id)
//            ->get();
        $edit_product = DB::table('sanpham')->where('sanpham_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product',$brand_product)
            ->with('sup_product',$sup_product)
            ->with('color_product',$color_product)
            ->with('size_product',$size_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request, $brand_id){
        $this->AuthLogin();
        $data = array();
        $data['sanpham_ten'] = $request->product_name;
        $data['sanpham_mo_ta'] = $request->product_desc;
        $data['sanpham_hinh'] = $request->product_image;
        $data['name'] = $request->product_image_item;
        $data['mau_ten'] = $request->product_color;
        $data['size_ten'] = $request->product_size;
        $data['sanpham_gia'] = $request->product_price;
        $data['sanpham_gia_km'] = $request->product_price_sale;
        $data['danhmuc_ten'] = $request->product_cate;
        $data['thuonghieu_ten'] = $request->product_brand;
        $data['ncc_ten'] = $request->product_sup;

        DB::table('thuonghieu')->where('thuonghieu_id',$brand_id)->update($data);
        Session::put('message','Cập nhât thương hiệu thành công');
        return Redirect::to('all-brand');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('sanpham_ct')->where('sanpham_id',$product_id)->delete();
        DB::table('sanpham')->where('sanpham_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //end public function admin

    public function details_product($product_id){
        $size = DB::table('sanpham_ct')->select('sanpham_size.size_id','sanpham_size.size_ten')->distinct()->join('sanpham_size','sanpham_size.size_id','=','sanpham_ct.size_id')->where('sanpham_id', $product_id)->get();
        $mau = DB::table('sanpham_ct')->select('sanpham_mau.mau_id','sanpham_mau.mau_ten')->distinct()->join('sanpham_mau','sanpham_mau.mau_id','=','sanpham_ct.mau_id')->where('sanpham_id', $product_id)->get();
//        dd($mau);
        $cate_product = DB::table('danhmuc')->where('danhmuc_trang_thai','0')->orderby('danhmuc_id','desc')->get();
        $brand_product = DB::table('thuonghieu')->where('thuonghieu_trang_thai','0')->orderby('thuonghieu_id','desc')->get();
        $sanpham_hinh_item = DB::table('sanpham_hinh_item')->where('sanpham_id',$product_id)->orderby('id','desc')->get();

        $details_product = DB::table('sanpham')
            ->join('danhmuc','danhmuc.danhmuc_id','=','sanpham.danhmuc_id')
            ->join('thuonghieu','thuonghieu.thuonghieu_id','=','sanpham.thuonghieu_id')
            ->join('nhacungcap','nhacungcap.ncc_id','=','sanpham.ncc_id')
            ->where('sanpham.sanpham_id',$product_id)->first();

        $relate_product = DB::table('sanpham')
            ->join('danhmuc','danhmuc.danhmuc_id','=','sanpham.danhmuc_id')
            ->join('thuonghieu','thuonghieu.thuonghieu_id','=','sanpham.thuonghieu_id')
            ->join('nhacungcap','nhacungcap.ncc_id','=','sanpham.ncc_id')
            ->whereNotIn('sanpham.sanpham_id',[$product_id])->get();
        return view('pages.sanpham.show_details')
            ->with('category', $cate_product)
            ->with('brand', $brand_product)
            ->with('details_product', $details_product)
            ->with('relate',$relate_product)
            ->with('size',$size)
            ->with('mau',$mau)
            ->with('sanpham_hinh_item',$sanpham_hinh_item);
    }
}

