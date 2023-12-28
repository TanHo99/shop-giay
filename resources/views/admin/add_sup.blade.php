@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm nhà cung cấp
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-sup')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                                <input type="text" name="sup_name" class="form-control" id="exampleInputEmail1" placeholder="Tên nhà cung cấp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoai</label>
                                <input type="text" name="sup_phone" class="form-control" id="exampleInputEmail1" placeholder="Số địa thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ</label>
                                <input type="text" name="sup_add" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                            </div>

                            <button name="ncc_them" type="submit" class="btn btn-info">Thêm nhà cung cấp</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection

