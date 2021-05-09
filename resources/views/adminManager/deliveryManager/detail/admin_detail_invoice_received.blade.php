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
        <div class="panel-heading" style="text-align: center;">
            Thông tin đơn hàng
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Thời gian</th>
                        <th>Tình trạng đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice_status as $key => $status)
                    <tr>
                        <td><span class="text-ellipsis"></span>{{$status->invoice_id}}</td>
                        <td><span class="text-ellipsis"></span>{{$status->status_date}}</td>
                        <td><span class="text-ellipsis"></span>{{$status->status_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<hr>
<div>
    <h4>Cập nhật tình trạng giao hàng</h4>
    <form action="{{URL::TO('/admin-delievery-update-invoice-received/'.$account->invoice_id)}}" method="post">
        {{csrf_field()}}
        <div>
            <select name="invoice_status" id="">
                <option value="6">Giao hàng thành công</option>
                <option value="7">Giao hàng thất bại</option>
            </select>
        </div>
        <br>
        <button type="submit">Xác nhận</button>
    </form>
</div>
@endsection