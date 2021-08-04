<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="{{asset('public/Frontend/aboutme/CSS/aboutdemo.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/css/login/main.css')}}">
</head>

<body>
    <?php
    $acc_name = Session::get('adminname');
    $acc_img = Session::get('accImg');
    $acc_email = Session::get('accEmail');
    $acc_contact = Session::get('accContact');
    $perm_id = Session::get('permId');
    $acc_id = Session::get('acc_id');
    ?>
    <div class="about-section">
        <?php
        if ($perm_id === 1) {
        ?>
            <a href="{{URL::TO('/dashboard')}}">
            <?php
        } else if ($perm_id === 2) {
            ?>
                <a href="{{URL::TO('/order')}}">
                <?php
            } else if ($perm_id === 3) {
                ?>
                    <a href="{{URL::TO('/inventory')}}">
                    <?php

                } else if ($perm_id === 4) {
                    ?>
                        <a href="{{URL::TO('/delivery')}}">
                        <?php
                    }
                        ?>
                        <img src="{{asset('public/Upload/banner/zorbashop.png')}}" style="width: 160px; height: 80px;" alt="">
                        </a>
    </div>
    <div class="team" id="divteam">
        <h5 class="team" style="font-family: Segoe UI; font-weight: 700;">Thông tin tài khoản</h5>
    </div>
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<div class="alert alert-success alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
        '</div>';
        Session::put('message', null);
    }
    ?>
    <div class="row" style="margin: 0; background-color: #888888;">
        <div class="column">
            <div class="card" style="height: 500px;">
                <img class="avt" src="{{asset('public/Backend/images/'.$acc_img)}}" alt="avt">
                <div class="container">
                    <h2>{{$acc_name}}</h2>
                    <hr>
                    <p class="title"><i class="fas fa-phone-square-alt"></i> {{$acc_contact}}</p>
                    <p class="title"><i class="fas fa-envelope"></i> {{$acc_email}}</p>
                    <p class="title"><i class="fas fa-universal-access"></i> {{$per->perm_name}}</p>
                </div>
                <br>
                <div>
                    <form action="{{URL::TO('/update-info-admin/'.$acc_id)}}" method="get">
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                Cập nhật thông tin
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-1">
                    <form action="{{URL::TO('/update-password-admin/'.$acc_id)}}" method="get">
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                Thay đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/Frontend/loginCheckout/vendor/jquery/jquery.min.js')}}"></script>

</html>