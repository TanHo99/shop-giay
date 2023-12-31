@extends('welcome')
@section('content')

    <div class="features_items"><!--features_items-->
        @foreach($brand_name as $key => $bra)
            <h2 class="title text-center">{{$bra->thuonghieu_ten}}</h2>
        @endforeach
        @foreach($brand_by_id as $key => $product)
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->sanpham_id)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/upload/product/'.$product->sanpham_hinh)}}" alt="" />
                            <h2>{{number_format($product->sanpham_gia).' '.'VNĐ'}}</h2>
                            <p>{{$product->sanpham_ten}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thícht</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div><!--features_items-->


@endsection


