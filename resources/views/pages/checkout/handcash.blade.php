@extends('layout')
@section('content')

<div class="review-payment" style="text-align: center;">
    <div>
        <h2 style="margin-top: 20px; font-weight: bolder;">Cảm ơn bạn đã mua hàng! Đơn hàng của bạn sẽ sớm được xử lý. Bạn có thể kiểm tra thông tin đơn hàng tại <a href="{{URL::TO('/info/'.$acc_id)}}"> đây</a>.</h2>
        <p>Nhân viên của cửa hàng sẽ gọi điện xác nhận đơn hàng.</p>
        <a class="btn btn-default check_out" href="javascript:history.back()" style="margin: 5px 0;">Tiếp tục mua hàng</a>
    </div>
    <img src="{{asset('public/Upload/banner/thank-you.jpg')}}" alt="" srcset="">
</div>

@endsection