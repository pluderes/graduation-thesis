@extends('layout')
@section('content')


<link href="{{asset('public/Frontend/css2/main.css')}}" rel="stylesheet">
<section id="cart_items">
    <div class="container">
        <div id="form-deli">
            <div class="row">
                <div class="col-sm-9">
                    <h2 style="text-align: center; color: seagreen;">Quên mật khẩu</h2>
                    <hr>
                    <div class="bill-to row">
                        <div class="form-one">
                            <?php
                            $success = Session::get('success');
                            if ($success) {
                                echo '<div class="alert alert-success alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $success,
                                '</div>';
                                Session::put('success', null);
                            }
                            if ($errors->has('password')) {
                                $message = "Mật khẩu không hợp lệ. Mật khẩu cần ít nhất 6 kí tự";
                                echo '<div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                                '</div>';
                                Session::put('message', null);
                            }
                            if ($errors->has('re_password')) {
                                $message = "Nhập lại mật khẩu không chính xác";
                                echo '<div class="alert alert-danger alert-dismissable text-center">
                                <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                                '</div>';
                                Session::put('message', null);
                            }
                            ?>

                            <form action="{{URL::to('/reset-password')}}" method="POST">
                                <?php
                                $token = $_GET['token'];
                                $email = $_GET['email'];
                                ?>
                                {{csrf_field()}}
                                <input type="hidden" name="token" value="{{$token}}">
                                <input type="hidden" name="email" value="{{$email}}">

                                <label for="new_password" style="color: seagreen;">Nhập mật khẩu mới</label>
                                <input type="password" id="new_password" name="new_password" placeholder="Mật khẩu mới(*)" required>
                                <label for="re_password" style="color: seagreen;">Nhập lại mật khẩu mới</label>
                                <input type="password" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới(*)" required>
                                <hr>
                                <input type="submit" value="Gửi" name="conf_deli" class="btn btn-sm" style="background-color: seagreen; color: seashell; font-size: 14px;">
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <img style="width: 450px; height: auto;" src="{{asset('public/Upload/banner/forgot-password.jpg')}}" alt="">
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