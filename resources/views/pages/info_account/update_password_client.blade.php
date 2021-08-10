<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đổi mật khẩu</title>

    <link href="{{asset('public/Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/Frontend/loginCheckout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/Frontend/loginCheckout/css/style.css')}}">
</head>

<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form action="{{URL::TO('/save-password-client/'.$edit_account->acc_id)}}" method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <h2 class="form-title">Đổi mật khẩu</h2>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                            '</div>';
                            Session::put('message', null);
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
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Mật khẩu" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Cập nhật" style="  cursor: pointer;" />
                        </div>
                    </form>
                    <p style="text-align: center;">
                        Hoặc <a href="{{URL::TO('/trang-chu')}}" class="loginhere-link">Trở về trang chủ</a>
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/Frontend/loginCheckout/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/Frontend/loginCheckout/js/main.js')}}"></script>
</body>

</html>