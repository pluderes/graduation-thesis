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
                                <label for="deli_email">Email</label>
                                <input type="text" name="deli_email" placeholder="Email(*)" value="{{$value->deli_email}}" required>
                                <label for="deli_name">Tên người nhận</label>
                                <input type="text" name="deli_name" placeholder="Tên người nhận(*)" value="{{$value->deli_name}}" required>
                                <label for="deli_phone">Số điện thoại</label>
                                <input type="text" name="deli_phone" placeholder="Số điện thoại(*)" value="{{$value->deli_phone}}" required>
                                <div>
                                    <label for="city">Chọn tỉnh - thành phố</label>
                                    <select name="city" id="city" class="choose city">
                                        <option value="">--- Chọn tỉnh - thành phố ---</option>
                                        @foreach($city as $key => $province)
                                        <option value="{{$province->matp}}">{{$province->province_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="district">Chọn quận - huyện</label>
                                    <select name="district" id="district" class="choose district">
                                        <option value="">--- Chọn quận - huyện ---</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="wards">Chọn xã - thị trấn</label>
                                    <select name="wards" id="wards" class="wards">
                                        <option value="">--- Chọn xã - thị trấn ---</option>
                                    </select>
                                </div>
                                <label for="deli_address">Số nhà hoặc địa điểm nhận biết</label>
                                <input type="text" name="deli_address" placeholder="Số nhà(*)" value="" required>
                                <label for="deli_note">Ghi chú</label>
                                <textarea name="deli_note" placeholder="Ghi chú đơn hàng." rows="3"></textarea>
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
</section>
<script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'district';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-address')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>

@endsection