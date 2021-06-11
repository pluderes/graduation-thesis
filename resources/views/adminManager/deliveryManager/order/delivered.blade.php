@extends('adminLayout')
@section('admin_content')
<div class="panel-heading" style="text-align: center; background-color: lightgray;">
    <h2 style="margin: 0;">Danh sách đơn hàng đã giao</h2>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<div class="alert alert-danger alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
            '</div>';
            Session::put('message', null);
        }
        ?>
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
                            <a href="{{URL::TO('/admin-delivery-detail-invoice-delivered/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                        </td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_id}}</span></td>
                        <td>{{$invoice->acc_name}}</td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_total}}</span></td>
                        <td><span class="text-ellipsis">{{$invoice->current_status}}</span></td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_date_time}}</span></td>
                        <td><span class="text-ellipsis">{{$invoice->deli_address}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">

        </footer>
    </div>
</div>
@endsection