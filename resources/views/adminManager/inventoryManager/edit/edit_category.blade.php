@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            <h2 style="margin: 0;">Cập nhật danh mục sách</h2>
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                '</div>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_category as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-category/'.$edit_value->cate_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categoryName">Tên danh mục</label>
                        <input type="text" class="form-control" id="categoryName" name="cate_name" value="{{$edit_value->cate_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryDesc">Mô tả</label>
                        <br>
                        <textarea name="cate_desc" id="categoryDesc" cols="100" rows="5" required>{{$edit_value->cate_desc}}</textarea>
                    </div>
                    <button id="btnsubmit" type="submit" class="btn btn-info">Xác nhận</button>
                </form>
                <button style="margin-top: 10px;" id="btnback" type="submit" class="btn btn-info" onclick="goBack()">Trở về</button>
            </div>
            @endforeach
        </div>
    </section>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection