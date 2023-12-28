@extends('admin_layout')
@Section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục
            </header>
            <?php
            $message = Session::get('message',null);
            if($message){}
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message')
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-category')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" name="category_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_status" class="form-control input-sm m-bot15">
                                <option value="1">Ẩn</option>
                                <option value="0">Hiển thị</option>
                            </select>
                        </div>
                        <button name="danhmuc_them" type="submit" class="btn btn-info">Thêm Danh Mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
