@extends('adminLayout')
@section('admin_content')
<?php
$message = Session::get('message');
$inv_id = Session::get('inv-id');
if ($message) {
  echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
  '</div>';
  Session::put('message', null);
}
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center; background-color: lightgray;">
      <h3 style="margin: 0;">Thông tin khách hàng</h3>
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
    <div class="panel-heading" style="text-align: center; background-color: lightgray;">
      <h3 style="margin: 0;">Chi tiết đơn hàng</h3>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sách</th>
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
            <td><span class="text-ellipsis"></span>{{$invoice_id->invoice_total}} (Đã tính phí)</td>
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
    <div class="panel-heading" style="text-align: center; background-color: lightgray;">
      <h3 style="margin: 0;">Thông tin đơn hàng</h3>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <?php
        $count = Session::get('countstatus');
        if ($count > 0) {
        ?>
          <thead>
            <tr>
              <th>Mã đơn hàng</th>
              <th>Thời gian</th>
              <th>Tình trạng đơn hàng</th>
              <th>Người giao hàng</th>
              <th>Số điện thoại</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoice_status as $key => $status)
            <tr>
              <td><span class="text-ellipsis"></span>{{$status->invoice_id}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_date}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_name}}</td>
              <td><span class="text-ellipsis"></span>{{$status->acc_name}}</td>
              <td><span class="text-ellipsis"></span>{{$status->acc_contact}}</td>
            </tr>
            @endforeach
          </tbody>
        <?php
        } else {
        ?>
          <thead>
            <tr>
              <th>Mã đơn hàng</th>
              <th>Thời gian</th>
              <th>Tình trạng đơn hàng</th>
              <th>Người giao hàng</th>
              <th>Số điện thoại</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoice_status1 as $key => $status)
            <tr>
              <td><span class="text-ellipsis"></span>{{$status->invoice_id}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_date}}</td>
              <td><span class="text-ellipsis"></span>{{$status->status_name}}</td>
              <td><span class="text-ellipsis"></span></td>
              <td><span class="text-ellipsis"></span></td>
            </tr>
            @endforeach
          </tbody>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<hr>
<div>
  <h4>Cập nhật tình trạng đơn hàng</h4>
  <form action="{{URL::TO('/admin-update-invoice/'.$account->invoice_id)}}" method="post">
    {{csrf_field()}}
    <select name="invoice_status" id="">
      @foreach($status_detail as $key => $detail)
      <option value="{{$detail->status_detail_id}}">{{$detail->status_detail_id}} - {{$detail->status_name}}</option>
      @endforeach
    </select>
    <br>
    @foreach($current_status as $key => $current_status)
    <?php
    if ($current_status->current_status === 'Giao hàng thành công' || $current_status->current_status === 'Giao hàng thất bại') {
    ?>
      <button style="margin-top: 10px;" id="btnsubmit" type="submit" class="btn btn-info" disabled>Câp nhật</button>
    <?php
    } else {
    ?>
      <button style="margin-top: 10px;" id="btnsubmit" type="submit" class="btn btn-info">Câp nhật</button>
    <?php
    }
    ?>
    @endforeach
  </form>
  <a style="margin-top: 10px; color: white;" class="btn btn-info" href="{{url('/print-invoice/'.$inv)}}">Xuất hóa đơn</a>
  <br>
  <a style="margin-top: 10px; color: white;" class="btn btn-info" href="{{url('/admin-all-invoice')}}">Trở về</a>
</div>
<script>
  function goBack() {
    window.history.back();
  }
</script>
@endsection