@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    @foreach($edit_category as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category/'.$edit_value->danhmuc_id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{$edit_value->danhmuc_ten}}" name="category_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none"  rows="8" name="category_desc" class="form-control"
                                          id="exampleInputPassword1" >{{$edit_value->danhmuc_mo_ta}}</textarea>
                            </div>

                            <button name="category_update" type="submit" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    </div>
                    @endforeach
                </div>

            </section>

        </div>
    </div>
@endsection

