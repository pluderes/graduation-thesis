@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            <h2 style="margin: 0;">Cập nhật trạng thái sách</h2>
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
            @foreach($edit_status as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-status/'.$edit_value->status_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="statusName">Tên trạng thái</label>
                        <input type="text" class="form-control" id="statusName" name="status_name" value="{{$edit_value->status_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="statusDesc">Mô tả</label>
                        <br>
                        <textarea name="status_desc" id="statusDesc" cols="100" rows="5" required>{{$edit_value->status_desc}}</textarea>
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