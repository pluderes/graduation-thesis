<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí tài khoản</title>

    <link href="{{asset('public/Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/Frontend/loginCheckout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/Frontend/loginCheckout/css/style.css')}}">


</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="{{URL::TO('/add-customer')}}" method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <h2 class="form-title">Tạo tài khoản</h2>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<div style="background-color: #f8d7da; font-family: Montserrat">
						    <button type="button" style="background-color:#f8d7da; border: unset; height: 50px;" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                            '</div>';
                            Session::put('message', null);
                        }
                        if ($errors->has('acc_contact')) {
                            $message = "Số điện thoại không hợp lệ";
                            echo '<div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                            '</div>';
                            Session::put('message', null);
                        }
                        if ($errors->has('email')) {
                            $message = "Email không hợp lệ!";
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
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="acc_name" id="name" placeholder="Tên tài khoản" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="Tên đăng nhập" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="acc_contact" id="contact" placeholder="Số điện thoại" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Mật khẩu" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu" required />
                        </div>
                        <div class="form-group">
                            <!-- <textarea id="thumbnail" name="acc_thumbnail" cols="100" rows="5" style="display:none"></textarea> -->
                            <label for="accThumbnail">Hình ảnh</label>
                            <br>
                            <input type="file" name="inpthumbnail" class="form-control" id="accThumbnail" style="  cursor: pointer;">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Đăng kí" style="  cursor: pointer;" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Bạn đã có tài khoản? <a href="{{URL::TO('/adminLogin')}}" class="loginhere-link">Đăng nhập ngay</a>
                    </p>
                    <p style="text-align: center;">
                        Hoặc <a href="{{URL::TO('/trang-chu')}}" class="loginhere-link">Trở về trang chủ</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script>
        //  img
        // let inpThumbnail = document.getElementById("accThumbnail");
        // let thumbnail = document.getElementById("thumbnail");
        // inpThumbnail.addEventListener("change", function() {
        //     if (inpThumbnail.value != null) {
        //         thumbnail.innerHTML = inpThumbnail.value.substring(12, inpThumbnail.length);
        //     }
        //     console.dir(inpThumbnail);
        //     console.dir(thumbnail);
        // });

        // check password
        // $('#password, #re_password').on('keyup', function() {
        //     if ($('#password').val() == $('#re_password').val()) {
        //         $('#message').html('Matching').css('color', 'green');
        //     } else
        //         $('#message').html('Not Matching').css('color', 'red');
        // });
    </script>
    <script src="{{asset('public/Frontend/loginCheckout/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/Frontend/loginCheckout/js/main.js')}}"></script>
    <script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
</body>

</html>