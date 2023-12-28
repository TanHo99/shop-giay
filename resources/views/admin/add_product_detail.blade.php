@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-product-detail')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <select name="product_id" class="form-control input-sm m-bot15">
                                    @foreach($products as $item)
                                        <option value="{{$item->sanpham_id}}">{{$item->sanpham_id}} - {{$item->sanpham_ten}}</option>
                                    @endforeach
                                </select>
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
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text" name="product_quality" class="form-control" id="exampleInputEmail1">
                            </div>

                            <button name="danhmuc_them" type="submit" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection

