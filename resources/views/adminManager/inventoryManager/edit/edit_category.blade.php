@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Cập nhật danh mục sách
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_category as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/update-category/'.$edit_value->cate_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categoryName">Tên danh mục</label>
                        <input type="text" class="form-control" id="categoryName" name="cate_name" value="{{$edit_value->cate_name}}">
                    </div>
                    <div class="form-group">
                        <label for="categoryDesc">Mô tả</label>
                        <br>
                        <textarea name="cate_desc" id="categoryDesc" cols="100" rows="5">{{$edit_value->cate_desc}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection