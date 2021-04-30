@extends('inventoryLayout')
@section('inventory_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Thêm nhà xuất bản
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
                <form role="form" action="{{URL::TO('/save-supplier')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="supplierName">Tên nhà xuất bản</label>
                        <input type="text" class="form-control" id="supplierName" name="supplier_name">
                    </div>
                    <div class="form-group">
                        <label for="supplierContact">Liên hệ</label>
                        <input type="text" class="form-control" id="supplierContact" name="supplier_contact">
                    </div>
                    <div class="form-group">
                        <label for="supplierAddress">Địa chỉ</label>
                        <input type="text" class="form-control" id="supplierAddress" name="supplier_address">
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection