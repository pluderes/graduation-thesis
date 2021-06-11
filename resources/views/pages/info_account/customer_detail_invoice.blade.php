@extends('information')
@section('info_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Thông tin khách hàng
    </div>
    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
      '</div>';
      Session::put('message', null);
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($info_account as $key => $account)
          <tr>
            <td><span class="text-ellipsis"></span>{{$account->acc_name}}</span></td>
            <td><span class="text-ellipsis"></span>{{$account->deli_address}}</td>
            <td><span class="text-ellipsis"></span>{{$account->acc_contact}}</td>
            <td><span class="text-ellipsis"></span>{{$account->acc_email}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($invoice_by_id as $key => $invoice_id)
          <tr>
            <td><span class="text-ellipsis"></span>{{$invoice_id->prod_name}}</td>
            <td><span class="text-ellipsis"></span>{{$invoice_id->sell_quantity}}</td>
            <td><span class="text-ellipsis"></span>{{$invoice_id->prod_price}}</td>
            <td><span class="text-ellipsis"></span>{{$invoice_id->invoice_total}} VNĐ (Đã tính phí)</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Thông tin đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Người giao hàng</th>
            <th>Số điện thoại</th>
            <th>Thời gian</th>
            <th>Tình trạng đơn hàng</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count = Session::get('countstatus');
          if ($count > 0) {
          ?>
            @foreach($invoice_status as $key => $status)
            <tr>
              <td><span class="text-ellipsis"></span>{{$status->acc_name}}</td>
              <td><span class="text-ellipsis"></span>{{$status->acc_contact}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_date}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_name}}</td>
            </tr>
            @endforeach
          <?php
          } else {
          ?>
            @foreach($invoice_detail as $key => $status)
            <tr>
              <td><span class="text-ellipsis"></span></td>
              <td><span class="text-ellipsis"></span></td>
              <td><span class="text-ellipsis"></span>{{$status->status_date}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_name}}</td>
            </tr>
            @endforeach
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<hr>
<div class="action">
  <div class="">
    @foreach($info_account as $key => $account)
    <form action="{{URL::TO('/customer-cancel-invoice/'.$account->invoice_id)}}" method="post">
      {{csrf_field()}}
      <button id="cancel-invoice" onclick="return confirm(`Bạn muốn hủy đơn hàng này?`)" type="submit">Hủy đơn hàng</button>
    </form>
    @endforeach
    <br>
    <a href="{{ URL::previous() }}" class="button">Quay lại</a>
  </div>
</div>
@endsection