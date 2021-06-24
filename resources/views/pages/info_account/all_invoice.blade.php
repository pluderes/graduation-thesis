@extends('information')
@section('info_content')
<?php
$message = Session::get('message');
if ($message) {
  echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
  '</div>';
  Session::put('message', null);
}
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Danh sách đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>Mã đơn hàng</th>
            <th>Tổng tiền</th>
            <th>Tình trạng đơn hàng</th>
            <th>Ngày đặt hàng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_invoice as $key => $invoice)
          <tr>
            <td>
              <a href="{{URL::TO('/customer-detail-invoice/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-info-circle" style="color: #000;"></i></a>
              <!-- <a onclick="return confirm(`Bạn có chắc muốn xóa đơn hàng này?`)" href="{{URL::TO('/order-delete-invoice/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a> -->
            </td>
            <td><span class="text-ellipsis">{{$invoice->invoice_id}}</span></td>
            <td><span class="text-ellipsis">{{$invoice->invoice_total}} VNĐ</span></td>
            <td>{{$invoice->current_status}}</td>
            <td><span class="text-ellipsis">{{$invoice->invoice_date_time}}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- <footer class="panel-footer">
      <div class="row">
      </div>
    </footer> -->
  </div>
</div>
@endsection