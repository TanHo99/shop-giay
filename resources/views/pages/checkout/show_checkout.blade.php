@extends('welcome')
@section('content')
    <!-- breadcrumbs area start -->
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
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- START MAIN CONTAINER -->
    <div class="main-container">
        <div class="product-cart">
            <div class="container">
                <div class="row">
                    <div class="checkout-content">
                        <div class="col-md-12 check-out-blok">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="true" aria-controls="checkoutMethod">
                                                <span></span> Thông tin giao hàng
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="checkoutMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="content-info">
                                            <div class="col-md-7">
                                                <div class="checkout-reg">
                                                    <div class="position-center">
                                                        <p class="plxLoginP">Bạn đã có tài khoản?  <a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></p>
                                                        <form role="form" action="{{URL::to('/save-brand')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Họ và tên">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea style="resize: none" rows="8" name="brand_desc" class="form-control" id="exampleInputPassword1" placeholder="Ghi chú"></textarea>
                                                            </div>
                                                            <div class="checkTitle">
                                                                <h2 class="ct-design">Hình thức thanh toán</h2>
                                                            </div>
                                                            <a href="#" class="checkPageBtn">Thanh toán</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="checkout-login">
                                                    <form action="{{URL::to('/login')}}" method="post" class="login">
                                                        {{csrf_field()}}
                                                        <!-- Shopping Cart Table -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                        <?php
                                                                        $content = Cart::content();
                                                                        ?>
                                                                        <tbody>
                                                                        @foreach($content as $v_content)
                                                                            <tr>
                                                                                <td>
                                                                                    <a href="#"><img style="width: 100px; height: 100px" src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" class="img-responsive" alt=""/></a>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>{{$v_content->name}}</h6>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>{{$v_content->options->color}}/{{$v_content->options->size}}</h6>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="cart-price">{{number_format($v_content->price).' '.'vnđ'}}</div>
                                                                                </td>
                                                                                <td class="cart_quantity">
                                                                                    <div class="cart_quantity_button">
                                                                                        <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                                                                            {{csrf_field()}}
                                                                                            <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
                                                                                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                                                            <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                                                                        </form>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="cart-subtotal">
                                                                                            <?php
                                                                                            $subtotal = $v_content->qty * $v_content->price;
                                                                                            echo number_format($subtotal).' '.'vnđ';
                                                                                            ?></div>
                                                                                </td>
                                                                                <td class="cart_delete">
                                                                                    <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Shopping Cart Table -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- div.info-section -->
            </div>
            <!-- Checkout Container -->
            <div class="clearfix"></div>
        </div><!-- product-cart -->
    </div>
    <!-- END MAIN CONTAINER -->
@endsection
