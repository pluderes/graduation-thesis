<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa thông tin tài khoản</title>

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
                    <div>
                        <form action="{{URL::TO('/update-info/'.$edit_account->acc_id)}}" method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <h2 class="form-title">Thông tin tài khoản</h2>
                            <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo '<div class="alert alert-danger alert-dismissable text-center">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
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
                            ?>
                            <div class="form-group">
                                <input type="text" class="form-input" name="acc_name" id="name" placeholder="Tên tài khoản" value="{{$edit_account->acc_name}}" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="acc_contact" id="contact" placeholder="Số điện thoại" value="{{$edit_account->acc_contact}}" required />
                            </div>
                            <div class="form-group">
                                <textarea id="thumbnail" name="account_thumbnail" cols="100" rows="5" style="display:none">{{$edit_account->acc_img}}</textarea>
                                <label for="accThumbnail">Hình ảnh</label>
                                <br>
                                <input type="file" name="inpthumbnail" class="form-control" id="accThumbnail" style="cursor: pointer;">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Cập nhật" style="  cursor: pointer;" />
                            </div>
                        </form>
                    </div>
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
    <script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/Frontend/loginCheckout/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/Frontend/loginCheckout/js/main.js')}}"></script>
</body>

</html>