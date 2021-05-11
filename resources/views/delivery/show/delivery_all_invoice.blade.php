@extends('deliveryLayout')
@section('delivery_content')
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
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:100px;"></th>
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
                            <div class="row" style="margin-left: 10px;">
                                <a href="{{URL::TO('/delivery-detail-invoice/'.$invoice->invoice_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success1 text-active"></i></a>
                                <form action="{{URL::TO('/delivery-add-ship/'.$invoice->invoice_id)}}" method="post">
                                    {{(csrf_field())}}
                                    <button onclick="return confirm(`Nhận giao đơn hàng này?`)" type="submit" class="add-invoice"><i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_id}}</span></td>
                        <td>{{$invoice->acc_name}}</td>
                        <td><span class="text-ellipsis">{{$invoice->invoice_total}} VND</span></td>
                        <td><span class="text-ellipsis">{{$invoice->current_status}}</span></td>
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