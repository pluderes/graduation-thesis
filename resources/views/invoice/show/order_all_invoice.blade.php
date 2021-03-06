@extends('orderLayout')
@section('order_content')
<div class="panel-heading" style="text-align: center;">
  <h2 style="margin: 0;">Danh sách đơn hàng</h2>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<div class="alert alert-warning alert-dismissable text-center">
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
          </tr>
        </thead>
        <tbody>
          @foreach($all_invoice as $key => $invoice)
          <tr>
            <td>
              <a href="{{URL::TO('/order-edit-invoice/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><span class="text-ellipsis">{{$invoice->invoice_id}}</span></td>
            <td>{{$invoice->acc_name}}</td>
            <td><span class="text-ellipsis">{{$invoice->invoice_total}}</span></td>
            <td>{{$invoice->current_status}}</td>
            <td><span class="text-ellipsis">{{$invoice->invoice_date_time}}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <form action="{{url('/export-invoice')}}" method="POST">
        {{@csrf_field()}}
        <button style="margin-top: 10px;" id="btnsubmit" type="submit" class="btn btn-info" name="export_invoice">Xuất excel</button>
      </form>
    </footer>
  </div>
</div>
@endsection