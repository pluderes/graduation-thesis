<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Your Information</title>

    <!-- favicon -->
    <link href="favicon.png" rel=icon>

    <!-- web-fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet"> -->

    <!-- font-awesome -->
    <link href="{{asset('public/Frontend/css-info/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link href="{{asset('public/Frontend/css-info/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style CSS -->
    <link href="{{asset('public/Frontend/css-info/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar">
    <div id="main-wrapper">
        <!-- Page Preloader -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes">Chờ một chút nhé..</div>
            </div>
        </div>
        <?php
        $image = Session::get('accImg');
        ?>
        <div class="columns-block">
            <div class="left-col-block blocks">
                <header class="header">
                    <div class="profile-img">
                        <img id="img_acc" src="{{asset('public/Backend/images/'.$image)}}" alt="">
                    </div>
                </header>
                <!-- .header-->
            </div>

            <div class="right-col-block blocks">
                <section class="intro section-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <div class="front row">
                                        <a href="{{URL::TO('/trang-chu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                                        <a href="{{URL::TO('/adminLogout')}}" id="logout"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                                    </div>
                                </div>
                                <div class="content text-center">
                                    <h1>Xin chào, <?php
                                                    $name = Session::get('adminname');
                                                    if ($name) {
                                                        echo $name;
                                                    }
                                                    ?></h1>
                                    <ul class="social-icon">
                                        <li>
                                            <p><i class="fa fa-envelope"></i> <?php
                                                                                $email = Session::get('accEmail');
                                                                                if ($email) {
                                                                                    echo $email;
                                                                                }
                                                                                ?></p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-phone"></i> <?php
                                                                            $contact = Session::get('accContact');
                                                                            if ($contact) {
                                                                                echo $contact;
                                                                            }
                                                                            ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="invoice">
                    @yield('info_content')
                </div>

                <footer class="footer">
                    <div class="copyright-section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copytext">&copy; 2015 Online CV. All rights reserved | Design By: <a href="https://www.facebook.com/pluderes/">Trung Đức</a></div>
                                </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!-- .container-fluid -->
                    </div>
                    <!-- .copyright-section -->
                </footer>
                <!-- .footer -->
            </div>
            <!-- .right-col-block -->
        </div>
        <!-- .columns-block -->
    </div>
    <!-- #main-wrapper -->

    <!-- jquery -->
    <script src="{{asset('public/Frontend/js-info/jquery-2.1.4.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('public/Frontend/js-info//bootstrap.min.js')}}"></script>
    <script src="{{asset('public/Frontend/js-info//scripts.js')}}"></script>
</body>

</html>