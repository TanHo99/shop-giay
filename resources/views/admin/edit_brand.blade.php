@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    @foreach($edit_brand as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-brand/'.$edit_value->thuonghieu_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$edit_value->thuonghieu_ten}}" name="brand_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none"  rows="8" name="brand_desc" class="form-control"
                                              id="exampleInputPassword1" >{{$edit_value->thuonghieu_mo_ta}}</textarea>
                                </div>

                                <button name="brand_update" type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>

            </section>

        </div>
    </div>
@endsection


