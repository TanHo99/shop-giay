@extends('welcome')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
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
                                <img id="zoom1" src="{{URL::to('/public/upload/product/'.$details_product->sanpham_hinh)}}" data-zoom-image="img/product-details/ex-big-1-1.jpg" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                @foreach($sanpham_hinh_item as $k => $item_hinh)
                                    <li>
                                        <a href="#" class="elevatezoom-gallery {{$k == 0 ? 'active' : ''}}" data-update="" data-image="img/product-details/big-1-1.jpg"
                                           data-zoom-image="img/product-details/ex-big-1-1.jpg"><img src="{{URL::to('/public/upload/product/item/'.$item_hinh->name)}}" alt="zo-th-1" /></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <form action="{{URL::to('/save-cart')}}" method="post">
                                {{csrf_field()}}
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{$details_product->sanpham_ten}}</a></h2>
                                <div class="rating-price">
                                    <div class="pro-rating">
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{number_format($details_product->sanpham_gia).'VNĐ'}}</span>
                                    </div>
                                </div>
                                <div class="ProductForm__Option ProductForm__Option--labelled">
                                    <style>
                                        .SizeSwatch.is-active:after, .SizeSwatch__Radio:checked+.SizeSwatch {
                                            border-color: #dc232e;
                                            color: #383839;
                                        }
                                        .HorizontalList--spacingTight {
                                            margin-left: -8px;
                                            margin-right: -8px;
                                        }
                                        .HorizontalList {
                                            list-style: none;
                                            margin: -6px -8px;
                                        }
                                        *, *:before, *:after {
                                            -webkit-box-sizing: border-box!important;
                                            box-sizing: border-box!important;
                                            -webkit-font-smoothing: antialiased;
                                            -moz-osx-font-smoothing: grayscale;
                                        }
                                        user agent stylesheet
                                        ul {
                                            display: block;
                                            list-style-type: disc;
                                            margin-block-start: 1em;
                                            margin-block-end: 1em;
                                            margin-inline-start: 0px;
                                            margin-inline-end: 0px;
                                            padding-inline-start: 40px;
                                        }
                                        .HorizontalList--spacingTight .HorizontalList__Item {
                                            margin-right: 8px;
                                            margin-left: 8px;
                                        }
                                        .HorizontalList__Item {
                                            display: inline-block;
                                            margin: 6px 8px;
                                        }
                                        ul, li {
                                            list-style: none;
                                            margin: 0;
                                            padding: 0;
                                        }
                                        input[type=checkbox], input[type=radio] {
                                            /* -webkit-box-sizing: border-box; */
                                            /* box-sizing: border-box; */
                                            padding: 0;
                                        }
                                        .SizeSwatch__Radio {
                                            display: none;
                                        }
                                        input {
                                            line-height: normal;
                                            -webkit-appearance: none;
                                            border-radius: 0;
                                        }
                                        button, input, optgroup, select, textarea {
                                            color: inherit;
                                            font: inherit;
                                            margin: 0;
                                        }
                                        .SizeSwatch {
                                            min-width: 80px;
                                            padding: 11px 10px;
                                            border-radius: 4px;
                                        }

                                        .SizeSwatch {
                                            /* display: inline-block; */
                                            /* text-align: center; */
                                            /* min-width: 36px; */
                                            /* padding: 6px 10px; */
                                            border: 1px solid #cfcfcf;
                                            color: #383839;
                                            cursor: pointer;
                                        }
                                    </style>
                                    <span class="ProductForm__Label"> Màu sắc:</span>
                                    <ul class="SizeSwatchList HorizontalList HorizontalList--spacingTight variant__main product-form__option" data-selector-type="block">
                                        @foreach($mau as $v => $color)
                                            <li class="HorizontalList__Item block-swatch">
                                                <input id="option-1-{{$v }}" class="SizeSwatch__Radio" type="radio" name="color" value="{{$color->mau_id}}" @if($v == 0) checked="checked" @endif data-option-position="2">
                                                <label for="option-1-{{$v }}" class="SizeSwatch size-{{$color->mau_ten}}">{{$color->mau_ten}}</label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="ProductForm__Option ProductForm__Option--labelled">
                                    <style>
                                        .SizeSwatch.is-active:after, .SizeSwatch__Radio:checked+.SizeSwatch {
                                            border-color: #dc232e;
                                            color: #383839;
                                        }
                                        .HorizontalList--spacingTight {
                                            margin-left: -8px;
                                            margin-right: -8px;
                                        }
                                        .HorizontalList {
                                            list-style: none;
                                            margin: -6px -8px;
                                        }
                                        *, *:before, *:after {
                                            -webkit-box-sizing: border-box!important;
                                            box-sizing: border-box!important;
                                            -webkit-font-smoothing: antialiased;
                                            -moz-osx-font-smoothing: grayscale;
                                        }
                                        user agent stylesheet
                                        ul {
                                            display: block;
                                            list-style-type: disc;
                                            margin-block-start: 1em;
                                            margin-block-end: 1em;
                                            margin-inline-start: 0px;
                                            margin-inline-end: 0px;
                                            padding-inline-start: 40px;
                                        }
                                        .HorizontalList--spacingTight .HorizontalList__Item {
                                            margin-right: 8px;
                                            margin-left: 8px;
                                        }
                                        .HorizontalList__Item {
                                            display: inline-block;
                                            margin: 6px 8px;
                                        }
                                        ul, li {
                                            list-style: none;
                                            margin: 0;
                                            padding: 0;
                                        }
                                        input[type=checkbox], input[type=radio] {
                                            /* -webkit-box-sizing: border-box; */
                                            /* box-sizing: border-box; */
                                            padding: 0;
                                        }
                                        .SizeSwatch__Radio {
                                            display: none;
                                        }
                                        input {
                                            line-height: normal;
                                            -webkit-appearance: none;
                                            border-radius: 0;
                                        }
                                        button, input, optgroup, select, textarea {
                                            color: inherit;
                                            font: inherit;
                                            margin: 0;
                                        }
                                        .SizeSwatch {
                                            min-width: 80px;
                                            padding: 11px 10px;
                                            border-radius: 4px;
                                        }

                                        .SizeSwatch {
                                            /* display: inline-block; */
                                            /* text-align: center; */
                                            /* min-width: 36px; */
                                            /* padding: 6px 10px; */
                                            border: 1px solid #cfcfcf;
                                            color: #383839;
                                            cursor: pointer;
                                        }
                                    </style>
                                    <span class="ProductForm__Label"> Kích thước:
                                        <button type="button" class="ProductForm__LabelLink sizechart Link Text--subdued ProductsChonSize">Hướng dẫn chọn size</button>
                                    </span>
                                    <ul class="SizeSwatchList HorizontalList HorizontalList--spacingTight variant__main product-form__option" data-selector-type="block">
                                       @foreach($size as $k => $item)
                                            <li class="HorizontalList__Item block-swatch">
                                                <input id="option-2-{{$k }}" class="SizeSwatch__Radio" type="radio" name="size" value="{{$item->size_id}}" @if($k == 0) checked="checked" @endif data-option-position="2">
                                                <label for="option-2-{{$k }}" class="SizeSwatch size-{{$item->size_ten}}">{{$item->size_ten}}</label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

{{--                                <label style="border: 2px solid #;" for="option-1-0" class="SizeSwatch size-39">39</label>--}}
                                <div class="product-desc">
                                    <p>{{$details_product->sanpham_mo_ta}}</p>
                                </div>
                            </div>
                                <p class="availability in-stock">Tình trạng: <span><?php
                                if($details_product->sanpham_trang_thai==0) {?>Còn hàng<?php
                                } else {?>Hết hàng<?php } ?></span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <input type="number" name="qty" id="qty" min="1" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <input name="productid_hidden" type="hidden" value="{{$details_product->sanpham_id}}" />
                                        <div class="add-to-cart">
{{--                                            <a>Thêm giỏ hàng</a>--}}
                                            <button type="submit" class="btn btn-fefault cart">
                                                Thêm giỏ hàng
                                            </button>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
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
                                <p>{{$details_product->sanpham_mo_ta}}</p>
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
                                                        <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">Add a review</h3>
                                    <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
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
