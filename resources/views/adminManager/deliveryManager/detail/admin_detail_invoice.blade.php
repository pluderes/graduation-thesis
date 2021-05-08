@extends('adminLayout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Thông tin khách hàng
    </div>
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
      Thông tin đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($info_account as $key => $info_invoice)
          <tr>
            <td><span class="text-ellipsis"></span>{{$info_invoice->invoice_id}}</td>
            <td><span class="text-ellipsis"></span>{{$info_invoice->invoice_date_time}}</td>
            <td><span class="text-ellipsis"></span>{{$info_invoice->invoice_status}}</td>
            <td><span class="text-ellipsis"></span>{{$info_invoice->invoice_total}} (Đã tính phí)</td>
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
          </tr>
        </thead>
        <tbody>
          @foreach($invoice_by_id as $key => $info_invoice)
          <tr>
            <td><span class="text-ellipsis"></span>{{$info_invoice->prod_name}}</td>
            <td><span class="text-ellipsis"></span>{{$info_invoice->sell_quantity}}</td>
            <td><span class="text-ellipsis"></span>{{$info_invoice->prod_price}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      <form action="{{URL::TO('/admin-add-deli/'.$info_invoice->invoice_id)}}" method="post">
        {{csrf_field()}}
        <button type="submit">Nhận đơn</button>
      </form>
    </div>
  </div>
</div>
@endsection