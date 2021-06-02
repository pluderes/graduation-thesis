@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            <h2 style="margin: 0;">Cập nhật nhà xuất bản</h2>
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
            @foreach($edit_supplier as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-supplier/'.$edit_value->supplier_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="supplierName">Tên nhà xuất bản</label>
                        <input type="text" class="form-control" id="supplierName" name="supplier_name" value="{{$edit_value->supplier_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="supplierContact">Liên hệ</label>
                        <input type="text" class="form-control" id="supplierContact" name="supplier_contact" value="{{$edit_value->supplier_contact}}" required>
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress">Địa chỉ</label>
                        <input type="text" class="form-control" id="supplierAddress" name="supplier_address" value="{{$edit_value->supplier_addr}}" required>
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