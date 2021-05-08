@extends('adminLayout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;">
            Danh sách đơn hàng
        </div>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:red; font-weight:bold">', $message, '</span>';
            Session::put('message', null);
        }
        ?>
        <div class="row w3-res-tb">
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn" style="margin-left: 5px;">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:30px;"></th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_invoice as $key => $invoice)
                    <tr>
                        <td>
                            <a href="{{URL::TO('/admin-detail-invoice/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                            <a onclick="return confirm(`Nhận giao đơn hàng này?`)" href="{{URL::TO('/admin-add-deli/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-plus"></i></a>
                        </td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_total}}</span></td>
                        <td>{{$invoice->acc_name}}</td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_total}}</span></td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_date_time}}</span></td>
                        <td><span class="text-ellipsis">{{$invoice->deli_address}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection