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
</head>

<body>
    <?php
    $acc_name = Session::get('adminname');
    $acc_img = Session::get('accImg');
    $acc_email = Session::get('accEmail');
    $acc_contact = Session::get('accContact');
    $perm_id = Session::get('permId');
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
        <h5 class="team" style="font-family: Segoe UI; font-weight: 700;">Thông tin tài khoản của bạn</h5>
    </div>
    <div class="row" style="margin: 0; background-color: #888888;">
        <div class="column">
            <div class="card">
                <img class="avt" src="{{asset('public/Backend/images/'.$acc_img)}}" alt="avt">
                <div class="container">
                    <h2>{{$acc_name}}</h2>
                    <hr>
                    <p class="title"><i class="fas fa-phone-square-alt"></i> {{$acc_contact}}</p>
                    <p class="title"><i class="fas fa-envelope"></i> {{$acc_email}}</p>
                    <p class="title"><i class="fas fa-universal-access"></i> {{$per->perm_name}}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>