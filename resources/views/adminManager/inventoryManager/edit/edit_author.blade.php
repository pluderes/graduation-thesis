@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Cập nhật tác giả
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_author as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/update-author/'.$edit_value->author_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="authorName">Tên danh mục</label>
                        <input type="text" class="form-control" id="authorName" name="author_name" value="{{$edit_value->author_name}}">
                    </div>
                    <div class="form-group">
                        <label for="authorDesc">Mô tả</label>
                        <br>
                        <textarea name="author_desc" id="authorDesc" cols="100" rows="5">{{$edit_value->author_introduce}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection