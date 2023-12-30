<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lavoro | Trang chủ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend/img/favicon.ico') }}">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
        type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css') }}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.css') }}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.transitions.css') }}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/fonts/font-icon.css') }}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery-ui.css') }}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/meanmenu.min.css') }}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/custom-slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/frontend/custom-slider/css/preview.css') }}" type="text/css"
        media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.css') }}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/normalize.css') }}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/main.css') }}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/style.css') }}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">

    <script src="{{ asset('public/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body class="home-one">
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Add your site or application content here -->
    <!-- header area start -->
    <header class="short-stor">
        <div class="container-fluid">
            <div class="row">
                <!-- logo start -->
                <div class="col-md-3 col-sm-12 text-center nopadding-right">
                    <div class="top-logo">
                        <a href="{{ URL::to('/trang-chu') }}"><img src="{{ 'public/frontend/img/logo.gif' }}"
                                alt="" /></a>
                    </div>
                </div>
                <!-- logo end -->
                <!-- mainmenu area start -->
                <div class="col-md-6 text-center">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li class="expand"><a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>

                                </li>
                                <li class="expand"><a href="shop-grid.html">Giày</a>
                                    {{--                                <div class="restrain mega-menu megamenu1"> --}}
                                    {{--											<span> --}}
                                    {{--												<a class="mega-menu-title" href="shop-grid.html"> Dresses </a> --}}
                                    {{--												<a href="shop-grid.html">Coctail</a> --}}
                                    {{--												<a href="shop-grid.html">Day</a> --}}
                                    {{--												<a href="shop-grid.html">Evening </a> --}}
                                    {{--												<a href="shop-grid.html">Sports</a> --}}
                                    {{--											</span> --}}
                                    {{--                                </div> --}}
                                </li>
                                <li class="expand"><a href="shop-list.html">Dép</a>
                                    {{--                                <div class="restrain mega-menu megamenu2"> --}}
                                    {{--											<span> --}}
                                    {{--												<a class="mega-menu-title" href="shop-grid.html">Rings</a> --}}
                                    {{--												<a href="shop-grid.html">Coats & Jackets</a> --}}
                                    {{--												<a href="shop-grid.html">Blazers</a> --}}
                                    {{--												<a href="shop-grid.html">Jackets</a> --}}
                                    {{--												<a href="shop-grid.html">Rincoats</a> --}}
                                    {{--											</span> --}}
                                    {{--                                </div> --}}
                                </li>
                                <li class="expand"><a href="shop-grid.html">Thương hiệu</a>
                                    <ul class="restrain sub-menu">
                                        @foreach ($brand as $key => $brand)
                                            <li><a
                                                    href="{{ URL::to('/thuonghieu-sanpham/' . $brand->thuonghieu_id) }}">
                                                    <span class="pull-right"></span>{{ $brand->thuonghieu_ten }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="expand"><a href="about-us.html">Liên hệ</a></li>
                                <li class="expand"><a href="contact-us.html">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu start -->
                    <div class="row">
                        <div class="col-sm-12 mobile-menu-area">
                            <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                                <span class="mobile-menu-title">Menu</span>
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Trang chủ</a></li>
                                        <li><a href="shop-grid.html">Nam</a>
                                            <ul>
                                                <li><a href="shop-grid.html">Dresses</a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Coctail</a></li>
                                                        <li><a href="shop-grid.html">Day</a></li>
                                                        <li><a href="shop-grid.html">Evening </a></li>
                                                        <li><a href="shop-grid.html">Sports</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="mega-menu-title" href="shop-grid.html"> Handbags </a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Blazers</a></li>
                                                        <li><a href="shop-grid.html">Table</a></li>
                                                        <li><a href="shop-grid.html">Coats</a></li>
                                                        <li><a href="shop-grid.html">Kids</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="mega-menu-title" href="shop-grid.html"> Clothing </a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">T-Shirt</a></li>
                                                        <li><a href="shop-grid.html">Coats</a></li>
                                                        <li><a href="shop-grid.html">Jackets</a></li>
                                                        <li><a href="shop-grid.html">Jeans</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-list.html">Nữ</a>
                                            <ul>
                                                <li><a href="shop-grid.html">Rings</a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Coats & Jackets</a></li>
                                                        <li><a href="shop-grid.html">Blazers</a></li>
                                                        <li><a href="shop-grid.html">Jackets</a></li>
                                                        <li><a href="shop-grid.html">Rincoats</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="shop-grid.html">Dresses</a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Ankle Boots</a></li>
                                                        <li><a href="shop-grid.html">Footwear</a></li>
                                                        <li><a href="shop-grid.html">Clog Sandals</a></li>
                                                        <li><a href="shop-grid.html">Combat Boots</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="shop-grid.html">Accessories</a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Bootees bags</a></li>
                                                        <li><a href="shop-grid.html">Blazers</a></li>
                                                        <li><a href="shop-grid.html">Jackets</a></li>
                                                        <li><a href="shop-grid.html">Jackets</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="shop-grid.html">Top</a>
                                                    <ul>
                                                        <li><a href="shop-grid.html">Briefs</a></li>
                                                        <li><a href="shop-grid.html">Camis</a></li>
                                                        <li><a href="shop-grid.html">Nigntwears</a></li>
                                                        <li><a href="shop-grid.html">Shapewears</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="expand"><a href="shop-grid.html">Thương hiệu</a>
                                            <ul class="restrain sub-menu">
                                                {{--                                            @foreach ($brand as $key => $brand) --}}
                                                {{--                                                <li><a href="{{URL::to('/thuonghieu-sanpham/'.$brand->thuonghieu_id)}}"> <span class="pull-right"></span>{{$brand->thuonghieu_ten}}</a></li> --}}
                                                {{--                                            @endforeach --}}
                                            </ul>
                                        </li>
                                        <li class="expand"><a href="about-us.html">Liên hệ</a></li>
                                        <li class="expand"><a href="contact-us.html">Blog</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- mobile menu end -->
                </div>

                <!-- mainmenu area end -->
                <!-- top details area start -->
                <div class="col-md-3 col-sm-12 nopadding-left">
                    <div class="top-detail">
                        <!-- addcart top start -->
                        <div class="disflow">
                            <div class="circle-shopping expand">
                                <div class="shopping-carts text-right">
                                    <?php
                                    $content = Cart::content();
                                    $subtotal = 0;
                                    ?>
                                    <div class="cart-toggler">
                                        <a href="{{ URL::to('/show-cart') }}"><i class="icon-bag"></i></a>
                                        <a href="#"><span
                                                class="cart-quantity">{{ $content->count() }}</span></a>
                                    </div>
                                    <div class="restrain small-cart-content">

                                        <ul class="cart-list">
                                            @foreach ($content as $v_content)
                                                <li>
                                                    <a class="sm-cart-product" href="product-details.html">
                                                        <img src="{{ URL::to('public/upload/product/' . $v_content->options->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="small-cart-detail">
                                                        <a class="remove"
                                                            href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i
                                                                class="fa fa-times-circle"></i></a>
                                                        <a href="#" class="edit-btn"><img
                                                                src="{{ 'public/frontend/img/btn_edit.gif' }}"
                                                                alt="Edit Button" /></a>
                                                        <a class="small-cart-name"
                                                            href="product-details.html">{{ $v_content->name }}</a>
                                                        <span
                                                            class="quantitys"><strong>{{ $v_content->qty }}</strong>x<span>{{ number_format($v_content->price) . ' ' . 'vnđ' }}</span></span>
                                                    </div>
                                                </li>
                                                <?php
                                                $total = $v_content->qty * $v_content->price;
                                                $subtotal = $subtotal + $total;
                                                ?>
                                            @endforeach
                                        </ul>
                                        <p class="total">Tổng tiền:
                                            <span class="amount">
                                                {{ number_format($subtotal) . ' ' . 'vnđ' }}
                                            </span>
                                        </p>
                                        <p class="buttons">
                                            <a href="{{ URL::to('/show-checkout') }}" class="button">ĐẶT HÀNG</a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- addcart top start -->
                        <!-- search divition start -->
                        <div class="disflow">
                            <div class="header-search expand">
                                <div class="search-icon fa fa-search"></div>
                                <div class="product-search restrain">
                                    <div class="container nopadding-right">
                                        <form action="index.html" id="searchform" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" maxlength="128"
                                                    placeholder="Search product...">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- search divition end -->
                        <div class="disflow">
                            <div class="expand dropps-menu">
                                <a href="#"><i class="fa fa-align-right"></i></a>
                                <ul class="restrain language">
                                    <li><a href="login.html">Tài khoản của tôi</a></li>
                                    <li><a href="wishlist.html">Đăng nhập</a></li>
                                    <li><a href="cart.html">Đăng ký</a></li>
                                    <li><a href="checkout.html">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- top details area end -->
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- product section start -->
    <div class="our-product-area">
        @yield('content')
    </div>
    <!-- FOOTER START -->
    <footer>
        <!-- info footer start -->
        <div class="info-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Our Address</h3>
                                <p>118/23 Bùi Văn Ba, Phường Tân Thuận Đông, Quận 7, HCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Phone Support</h3>
                                <p>0523 284 884</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Email Support</h3>
                                <p>lavoro@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="info-fcontainer">
                            <div class="infof-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="infof-content">
                                <h3>Openning Hour</h3>
                                <p>Mon - Sun: 9:00 am - 22:00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- info footer end -->
        <!-- footer address area start -->
        <div class="address-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <address>Copyright © <a href="http://bootexperts.com/">BootExperts.</a> All Rights Reserved
                        </address>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="footer-payment pull-right">
                            <a href="#"><img src="{{ 'public/frontend/img/payment.png' }}"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer address area end -->
    </footer>
    <!-- FOOTER END -->

    <!-- JS -->

    <!-- jquery-1.11.3.min js
============================================ -->
    <script src="{{ asset('public/frontend/js/vendor/jquery-1.11.3.min.js') }}"></script>

    <!-- bootstrap js
============================================ -->
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>

    <!-- Nivo slider js
============================================ -->
    <script src="{{ asset('public/frontend/custom-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/frontend/custom-slider/home.js') }}" type="text/javascript"></script>

    <!-- owl.carousel.min js
============================================ -->
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>

    <!-- jquery scrollUp js
============================================ -->
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>

    <!-- price-slider js
============================================ -->
    <script src="{{ asset('public/frontend/js/price-slider.js') }}"></script>

    <!-- elevateZoom js
============================================ -->
    <script src="{{ asset('public/frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

    <!-- jquery.bxslider.min.js
============================================ -->
    <script src="{{ asset('public/frontend/js/jquery.bxslider.min.js') }}"></script>

    <!-- mobile menu js
============================================ -->
    <script src="{{ asset('public/frontend/js/jquery.meanmenu.js') }}"></script>

    <!-- wow js
============================================ -->
    <script src="{{ asset('public/frontend/js/wow.js') }}"></script>

    <!-- plugins js
============================================ -->
    <script src="{{ asset('public/frontend/js/plugins.js') }}"></script>

    <!-- main js
============================================ -->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
</body>

</html>
