@extends('inventoryLayout')
@section('inventory_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Thêm tình trạng sách
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::TO('/save-status')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="statusName">Tên trình trạng</label>
                        <input type="text" class="form-control" id="statusName" name="status_name" required>
                    </div>
                    <div class="form-group">
                        <label for="statusDesc">Mô tả</label>
                        <br>
                        <textarea name="status_desc" id="statusDesc" cols="100" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection