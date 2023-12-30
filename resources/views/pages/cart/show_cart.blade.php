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
                                <a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- Shopping Table Container -->
    <div class="cart-area-start">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <?php
                            $content = Cart::content();
                            ?>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Kích thước</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $v_content)
                                    <tr>
                                        <td>
                                            <a href="#"><img
                                                    src="{{ URL::to('public/upload/product/' . $v_content->options->image) }}"
                                                    class="img-responsive" alt="" /></a>
                                        </td>
                                        <td>
                                            <h6>{{ $v_content->name }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $v_content->options->color }}</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $v_content->options->size }}</h6>
                                        </td>
                                        <td>
                                            <div class="cart-price">{{ number_format($v_content->price) . ' ' . 'vnđ' }}
                                            </div>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input class="cart_quantity_input" type="text" name="cart_quantity"
                                                        value="{{ $v_content->qty }}">
                                                    <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart"
                                                        class="form-control">
                                                    <input type="submit" value="Cập nhật" name="update_qty"
                                                        class="btn btn-default btn-sm">
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-subtotal">
                                                <?php
                                                $subtotal = $v_content->qty * $v_content->price;
                                                echo number_format($subtotal) . ' ' . 'vnđ';
                                                ?></div>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete"
                                                href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->
            <div class="row">
                <div class="col-md-12 vendee-clue">

                    <!-- Shopping Code -->
                    <div class="shipping coupon hidden-sm">
                        <div class="">
                            <h5>Discount Codes</h5>
                        </div>
                        <p>Enter your coupon code if you have one.</p>
                        <form>
                            <input type="text" class="coupon-input">
                            <button class="pull-left" type="submit">APPLY COUPON</button>
                        </form>
                    </div>
                    <!-- Shopping Code -->
                    <!-- Shopping Totals -->
                    <div class="shipping coupon cart-totals">
                        <ul>
                            <li class="cartSubT">Tổng: <span>{{ number_format(Cart::subtotal()) . ' ' . 'vnđ' }}</span>
                            </li>
                            <li class="cartSubT">Phí ship:<span>0 vnđ</span></li>
                            <li class="cartSubT">Tổng thành tiền:
                                <span>{{ number_format(Cart::subtotal()) . ' ' . 'vnđ' }}</span>
                            </li>
                        </ul>
                        <li><a class="proceedbtn" href="{{ URL::to('/show-checkout') }}">Thanh toán</a></li>
                    </div>
                    <!-- Shopping Totals -->
                </div>
            </div>
            <!-- Shopping Coupon -->
        </div>
    </div>
    <!-- Shopping Table Container -->
@endsection
