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
                            $error = Session::get('error');
                            $success = Session::get('success');
                            if ($error) {
                                echo '<div class="alert alert-danger alert-dismissable text-center">
	                    <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $error,
                                '</div>';
                                Session::put('error', null);
                            } else if ($success) {
                                echo '<div class="alert alert-success alert-dismissable text-center">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $success,
                                '</div>';
                                Session::put('success', null);
                            }
                            ?>
                            <h5 style="color: seagreen;">Email đã đăng kí</h5>
                            <form action="{{URL::to('/password-retrieval')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="email_account" placeholder="Email(*)" required>
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