@extends('layout')
@section('content')


<link href="{{asset('public/Frontend/css2/main.css')}}" rel="stylesheet">

<section id="cart_items">
    <div class="container">
        <div id="form-deli">
            <div class="row">
                <div class="col-sm-9">
                    <h2 style="text-align: center; color: seagreen;">Thông tin vận chuyển</h2>
                    <hr>
                    <?php
                    if ($errors->has('deli_phone')) {
                        $message = "Số điện thoại không hợp lệ";
                        echo '<div class="alert alert-danger alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                        '</div>';
                        Session::put('message', null);
                    }
                    if ($errors->has('deli_email')) {
                        $message = "Email không hợp lệ";
                        echo '<div class="alert alert-danger alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                        '</div>';
                        Session::put('message', null);
                    }
                    ?>
                    <div class="bill-to row" style="margin: auto;">
                        @foreach($deli_info as $key => $value)
                        <div class="form-one col-sm-6">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="deli_email" placeholder="Email(*)" value="{{$value->deli_email}}" required>
                                <input type="text" name="deli_name" placeholder="Tên người nhận(*)" value="{{$value->deli_name}}" required>
                                <input type="text" name="deli_address" placeholder="Địa chỉ(*)" value="{{$value->deli_address}}" required>
                                <input type="text" name="deli_phone" placeholder="Số điện thoại(*)" value="{{$value->deli_phone}}" required>
                                <textarea name="deli_note" placeholder="Ghi chú đơn hàng." rows="16"></textarea>
                                <hr>
                                <input type="submit" value="Xác nhận" name="conf_deli" class="btn btn-sm" style="background-color: seagreen; color: seashell; font-size: 14px;">
                            </form>
                        </div>
                        @endforeach
                        <div class="col-sm-6">
                            <img style="width: fit-content; height: auto;" src="{{asset('public/Upload/banner/man-delivery.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
<!--/#cart_items-->

@endsection