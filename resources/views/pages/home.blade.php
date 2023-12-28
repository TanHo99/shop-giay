@extends('welcome')
@section('content')
    <!-- start home slider -->
    <div class="slider-area an-1 hm-1">
        <!-- slider -->
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{('public/frontend/img/slider/home-1/slider1-1.jpg')}}" alt="" title="#slider-direction-1"  />
                <img src="{{('public/frontend/img/slider/home-1/slider1-2.jpg')}}" alt="" title="#slider-direction-2"  />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-cn s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <h2 class="title1">minimal bags</h2>
                        <h3 class="title2" >collection</h3>
                        <h4 class="title2" >Simple is the best.</h4>
                        <a class="btn-title" href="">View collection</a>
                    </div>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-2 lft-pr">
                    <div class="title-container s-tb-c">
                        <h2 class="title1">minimal bags</h2>
                        <h3 class="title2" >collection</h3>
                        <h4 class="title2" >Simple is the best.</h4>
                        <a class="btn-title" href="">View collection</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider end-->
    </div>
    <!-- end home slider -->
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Sản phẩm mới</h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="features-tab">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="row">
                                    <div class="features-curosel">
                                        @foreach($all_product as $key => $product)
                                        <div class="col-lg-12 col-md-12">
                                            <!-- single-product start -->
                                            <div class="single-product first-sale">
                                                <div class="product-img">
                                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->sanpham_id)}}">
                                                        <img class="primary-image" src="{{URL::to('public/upload/product/'.$product->sanpham_hinh)}}" alt="" />
{{--                                                        <img class="secondary-image" src="{{('public/frontend/img/products/product-2.jpg')}}" alt="" />--}}
                                                    </a>
{{--                                                    <div class="action-zoom">--}}
{{--                                                        <div class="add-to-cart">--}}
{{--                                                            <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($product->sanpham_gia).' '.'VNĐ'}}</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="#">{{$product->sanpham_ten}}</a></h2>
                                                    <p>{{$product->sanpham_mo_ta}}</p>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->

        </div>

    <!-- banner-area start -->
    <div class="banner-area">
        <div class="container-fluid">
            <div class="row">
                <a href=""><img src="{{('public/frontend/img/banner/banner-1.jpg')}}" alt="" /></a>
            </div>
        </div>
    </div>
    <!-- banner-area end -->
        <!-- product section start -->
        <div class="our-product-area new-product">
            <div class="container">
                <div class="area-title">
                    <h2>Sản phẩm bán chạy</h2>
                </div>
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">
                                <!-- single-product start -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-image" src="{{('public/frontend/img/products/product-1.jpg')}}" alt="" />
                                                <img class="secondary-image" src="{{('public/frontend/img/products/product-2.jpg')}}" alt="" />
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{number_format($product->sanpham_gia).' '.'VNĐ'}}</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="#">{{$product->sanpham_ten}}</a></h2>
                                            <p>{{$product->sanpham_mo_ta}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- our-product area end -->
            </div>
        </div>
        <!-- product section end -->
            <!-- latestpost area start -->
            <div class="latest-post-area">
                <div class="container">
                    <div class="area-title">
                        <h2>Latest Post</h2>
                    </div>
                    <div class="row">
                        <div class="all-singlepost">
                            <!-- single latestpost start -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-post">
                                    <div class="post-thumb">
                                        <a href="#">
                                            <img src="{{('public/frontend/img/post/post-1.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="post-thumb-info">
                                        <div class="post-time">
                                            <a href="#">Beauty</a>
                                            <span>/</span>
                                            <span>Post by</span>
                                            <span>BootExperts</span>
                                        </div>
                                        <div class="postexcerpt">
                                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas...</p>
                                            <a href="#" class="read-more">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single latestpost end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- latestpost area end -->
            <!-- Brand Logo Area Start -->
            <div class="brand-area">
                <div class="container">
                    <div class="row">
                        <div class="brand-carousel">
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg1-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg1-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                            <div class="brand-item"><a href="#"><img src="{{('public/frontend/img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brand Logo Area End -->
@endsection
