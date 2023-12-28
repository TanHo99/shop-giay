@extends('admin_layout')
@Section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật size
                </header>
                <?php
                $message = Session::get('message',null);
                if($message){}
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message')
                ?>
                <div class="panel-body">
                    @foreach($edit_size as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-size/'.$edit_value->size_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên size</label>
                                    <input type="text" value="{{$edit_value->size_ten}}" name="size_name" class="form-control" id="exampleInputEmail1">
                                </div>

                                <button name="size_update" type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>

            </section>

        </div>
    </div>
@endsection



