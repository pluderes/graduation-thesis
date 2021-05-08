@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Cập nhật tình trạng sách
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_status as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-status/'.$edit_value->status_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="statusName">Tên danh mục</label>
                        <input type="text" class="form-control" id="statusName" name="status_name" value="{{$edit_value->status_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="statusDesc">Mô tả</label>
                        <br>
                        <textarea name="status_desc" id="statusDesc" cols="100" rows="5" required>{{$edit_value->status_desc}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection