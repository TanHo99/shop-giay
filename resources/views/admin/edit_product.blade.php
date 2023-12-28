@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->sanpham_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{$pro->sanpham_ten}}" name="product_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="exampleInputPassword1">{{$pro->sanpham_mo_ta}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                <img src="{{URL::to('/public/uploads/product/'.$pro->sanpham_hinh)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh con</label>
                                <input type="file" name="filenames[]" id="file_upload" multiple class="myfrm form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Màu</label>
                                <select name="product_color" class="form-control input-sm m-bot15">
                                    @foreach($color_product as $key => $color)
                                        <option value="{{$color->mau_id}}">{{$color->mau_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <select name="product_size" class="form-control input-sm m-bot15">
                                    @foreach($size_product as $key => $size)
                                        <option value="{{$size->size_id}}">{{$size->size_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" value="{{$pro->sanpham_gia}}" name="product_price" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                <input type="text" value="{{$pro->sanpham_gia_km}}" name="product_price_sale" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text"  name="product_quality" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        @if($cate->danhmuc_id==$pro->danhmuc_id)
                                            <option selected value="{{$cate->danhmuc_id}}">{{$cate->danhmuc_ten}}</option>
                                        @else
                                            <option value="{{$cate->danhmuc_id}}">{{$cate->danhmuc_ten}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        @if($brand->thuonghieu_id==$pro->thuonghieu_id)
                                            <option selected value="{{$brand->thuonghieu_id}}">{{$brand->thuonghieu_ten}}</option>
                                        @else
                                            <option value="{{$brand->thuonghieu_id}}">{{$brand->thuonghieu_ten}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhà cung cấp</label>
                                <select name="product_sup" class="form-control input-sm m-bot15">
                                    @foreach($sup_product as $key => $sup)
                                        @if($sup->ncc_id==$pro->ncc_id)
                                            <option selected value="{{$sup->ncc_id}}">{{$sup->ncc_ten}}</option>
                                        @else
                                            <option value="{{$sup->ncc_id}}">{{$sup->ncc_ten}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Trạng thái</label>--}}
{{--                                <select name="product_status" class="form-control input-sm m-bot15">--}}
{{--                                    <option value="0">Còn hàng</option>--}}
{{--                                    <option value="1">Hết hàng</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <button name="danhmuc_them" type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection

