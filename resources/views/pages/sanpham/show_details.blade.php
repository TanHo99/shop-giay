@extends('welcome')
@section('head')
    <link rel="stylesheet" href="{{ asset('public/frontend/css/detail-product.css') }}">
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Chi tiết sản phẩm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1"
                                    src="{{ URL::to('/public/upload/product/' . $details_product->sanpham_hinh) }}"
                                    data-zoom-image="img/product-details/ex-big-1-1.jpg" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                @foreach ($sanpham_hinh_item as $k => $item_hinh)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery {{ $k == 0 ? 'active' : '' }}"
                                            data-update="" data-image="img/product-details/big-1-1.jpg"
                                            data-zoom-image="img/product-details/ex-big-1-1.jpg"><img
                                                src="{{ URL::to('/public/upload/product/item/' . $item_hinh->name) }}"
                                                alt="zo-th-1" /></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <form action="{{ URL::to('/save-cart') }}" method="post">
                                {{ csrf_field() }}
                                <div class="product-content">
                                    <h2 class="product-name"><a href="#">{{ $details_product->sanpham_ten }}</a></h2>
                                    <span class=""> Kho: </span><span class="warehouse_quantity">0</span>
                                    <div class="rating-price">
                                        <div class="pro-rating">
                                        </div>
                                        <div class="price-boxes">
                                            <span
                                                class="new-price">{{ number_format($details_product->sanpham_gia) . 'VNĐ' }}</span>
                                        </div>
                                    </div>
                                    <div class="ProductForm__Option ProductForm__Option--labelled">
                                        <span class="ProductForm__Label"> Màu sắc:</span>
                                        <ul class="ColorSwatchList HorizontalList HorizontalList--spacingTight variant__main product-form__option color_option"
                                            data-selector-type="block">
                                            @foreach ($mau as $v => $color)
                                                <li class="HorizontalList__Item block-swatch">
                                                    <input id="option-color{{ $v }}"
                                                        class="ColorSwatch__Radio color_input" type="radio" name="color"
                                                        value="{{ $color->mau_id }}"
                                                        data-option-position="color{{ $v }}">
                                                    <label for="option-color{{ $v }}"
                                                        class="ColorSwatch color-{{ $color->mau_ten }}">{{ $color->mau_ten }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="ProductForm__Option ProductForm__Option--labelled">
                                        <span class="ProductForm__Label"> Kích thước:
                                            <button type="button"
                                                class="ProductForm__LabelLink sizechart Link Text--subdued ProductsChonSize">Hướng
                                                dẫn chọn size</button>
                                        </span>
                                        <ul class="SizeSwatchList HorizontalList HorizontalList--spacingTight variant__main product-form__option size_option"
                                            data-selector-type="block">
                                            @foreach ($size as $k => $item)
                                                <li class="HorizontalList__Item block-swatch">
                                                    <input id="option-size{{ $k }}"
                                                        class="SizeSwatch__Radio size_input" type="radio" name="size"
                                                        value="{{ $item->size_id }}"
                                                        data-option-position="size{{ $k }}">
                                                    <label for="option-size{{ $k }}"
                                                        class="SizeSwatch size-{{ $item->size_ten }}">Size:
                                                        {{ $item->size_ten }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="product-desc">
                                        <p>{{ $details_product->sanpham_mo_ta }}</p>
                                    </div>
                                </div>
                                <p class="availability in-stock">Tình trạng: <span><?php
                                if($details_product->sanpham_trang_thai==0) {?>Còn
                                        hàng<?php
                                } else {?>Hết hàng<?php } ?></span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <input type="number" name="qty" id="qty" min="1"
                                                value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <input name="productid_hidden" type="hidden"
                                            value="{{ $details_product->sanpham_id }}" />
                                        <div class="add-to-cart">
                                            <button type="submit" class="btn btn-fefault cart">
                                                Thêm giỏ hàng
                                            </button>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title=""
                                                    data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Nội dung</a></li>
                        <li class=""><a href="#messages" data-toggle="tab">Đánh giá (1)</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                <p>{{ $details_product->sanpham_mo_ta }}</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">
                                <div class="comments-area">
                                    <h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
                                    <div class="comments-list">
                                        <ul>
                                            <li>
                                                <div class="comments-details">
                                                    <div class="comments-list-img">
                                                        <img src="img/user-1.jpg" alt="">
                                                    </div>
                                                    <div class="comments-content-wrap">
                                                        <span>
                                                            <b><a href="#">Admin - </a></b>
                                                            <span class="post-time">October 6, 2014 at 1:38 am</span>
                                                        </span>
                                                        <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in
                                                            accumsan elit odio quis mi.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Add a review</h3>
                                    <span class="email-notes">Your email address will not be published. Required fields are
                                        marked *</span>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Name *</p>
                                                <input type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Email *</p>
                                                <input type="email">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Your Rating</p>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12 comment-form-comment">
                                                <p>Your Review</p>
                                                <textarea id="message" cols="30" rows="10"></textarea>
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
@endsection
@section('script')
    <script type="text/javascript">
        let ajaxLoadUrl = '{{ route('detail.ajax_warehouse_quantity') }}';
    </script>
    <script src="{{ asset('public/frontend/js/detail-product.js') }}"></script>
@endsection
