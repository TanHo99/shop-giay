@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật nhà cung cấp
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    @foreach($edit_sup as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-sup/'.$edit_value->ncc_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                                    <input type="text" value="{{$edit_value->ncc_ten}}" name="sup_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" value="{{$edit_value->ncc_sdt}}" name="sup_phone" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$edit_value->ncc_dia_chi}}" name="sup_add" class="form-control" id="exampleInputEmail1">
                                </div>
                                <button name="sup_update" type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>

            </section>

        </div>
    </div>
@endsection



