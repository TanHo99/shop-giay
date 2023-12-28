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
                            <li class="category3"><span>Đăng nhập</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form action="{{URL::to('/login')}}" method="post" class="login">
                            {{csrf_field()}}
                            <div class="form-fields">
                                <h2>Đăng nhập</h2>
                                <p class="form-row form-row-wide">
                                    <label for="username">Email<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="email_account" id="username" value="">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password_account" id="password">
                                </p>
                            </div>
                            <div class="form-action">
                                <p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
                                <div class="actions-log">
                                    <input type="submit" class="button" name="login" value="Đăng nhập">
                                </div>
                                <label for="rememberme" class="inline">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever">Ghi nhớ lần đăng nhập</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="customer-register my-account">
                        <form action="{{URL::to('/add-user')}}" method="post" class="register">
                            {{csrf_field()}}
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email<span class="required">*</span></label>
                                    <input type="email" class="input-text" name="user_email">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Mật khẩu<span class="required">*</span></label>
                                    <input type="password" class="input-text" name="user_password">
                                </p>
                                <div style="left: -999em; position: absolute;">
                                    <label for="trap">Anti-spam</label>
                                    <input type="text" name="email_2" id="trap" tabindex="-1">
                                </div>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-details Area end -->
@endsection
