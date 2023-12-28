@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm màu
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-color')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên màu</label>
                                <input type="text" name="color_name" class="form-control" id="exampleInputEmail1" placeholder="Tên màu">
                            </div>

                            <button name="mau_them" type="submit" class="btn btn-info">Thêm màu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection


