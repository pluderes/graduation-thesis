@extends('layout')
@section('content')


<link href="{{asset('public/Frontend/css2/main.css')}}" rel="stylesheet">

<section id="cart_items">
    <div class="container">
        <div id="form-deli">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Thông tin vận chuyển</h2>
                    <hr>
                    <div class="bill-to">
                    @foreach($deli_info as $key => $value)
                        <div class="form-one">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="deli_email" placeholder="Email(*)" value="{{$value->deli_email}}" required>
                                <input type="text" name="deli_name" placeholder="Tên của bạn(*)" value="{{$value->deli_name}}"required>
                                <input type="text" name="deli_address" placeholder="Địa chỉ(*)" value="{{$value->deli_address}}"required>
                                <input type="text" name="deli_phone" placeholder="Số điện thoại(*)" value="{{$value->deli_phone}}"required>
                                <textarea name="deli_note" placeholder="Ghi chú đơn hàng của bạn." rows="16"></textarea>
                                <hr>
                                <input type="submit" value="Xác nhận" name="conf_deli" class="btn btn-sm" style="background-color: seagreen; color: seashell; font-size: 14px;">
                            </form>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
<!--/#cart_items-->

@endsection