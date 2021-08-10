<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang quản lý</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('public/Backend/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('public/Backend/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('public/Backend/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/Backend/assets/css/style.css')}}">
    <script src="{{asset('public/Backend/js/jquery.form-validator.min.js')}}"></script>
    <script>
        $.validate({
            lang: "en"
        });
    </script>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::TO('/dashboard')}}">
                            <img style="width: 150px; margin-left: 25px;" src="{{asset('public\Upload\banner\zorbashop.png')}}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <!-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </li> -->
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <?php
                                    $image = Session::get('accImg');
                                    $acc_id = Session::get('acc_id');
                                    ?>
                                    <img class="img-radius" style="height: 40px;" src="{{asset('public/Backend/images/'.$image)}}" alt="User-Profile-Image">
                                    <span> <?php
                                            $name = Session::get('adminname');
                                            if ($name) {
                                                echo $name;
                                            }
                                            ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="{{URL::TO('/info-admin/'.$acc_id)}}">
                                            <i class="ti-user"></i> Hồ sơ
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="{{URL::TO('/adminLogout')}}">
                                            <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" style="height: 60px;" src="{{asset('public/Backend/images/'.$image)}}" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">
                                            <?php
                                            $name = Session::get('adminname');
                                            if ($name) {
                                                echo $name;
                                            }
                                            ?>
                                            <i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="{{URL::TO('/info-admin/'.$acc_id)}}"><i class="ti-user"></i>Xem hồ sơ</a>
                                            <a href="{{URL::TO('/adminLogout')}}"><i class="ti-layout-sidebar-left"></i>Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{URL::TO('/dashboard')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Điều khiển quản trị </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Quản lý</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <!-- menu 2 lv -->
                                        <li class="pcoded-hasmenu ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Quản lý đơn hàng</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{URL::TO('/admin-all-invoice')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Hiển thị</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- end menu 2 lv -->
                                        <!-- menu 2 lv -->
                                        <li class="pcoded-hasmenu ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Quản lý sách</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="pcoded-hasmenu">
                                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm mới</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-category')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm danh mục sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-type')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm loại sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-status')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm tình trạng sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-supplier')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm nhà xuất bản</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-author')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm tác giả</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-add-product')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="pcoded-hasmenu">
                                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Hiển thị</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                    <ul class="pcoded-submenu">
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-category')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Danh mục sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-type')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Loại sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-status')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Tình trạng sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-supplier')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Nhà xuất bản</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-author')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Tác giả</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{URL::TO('/admin-all-product')}}" class="waves-effect waves-dark">
                                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Sách</span>
                                                                <span class="pcoded-mcaret"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- end menu 2 lv -->
                                        <!-- menu 2 lv -->
                                        <li class="pcoded-hasmenu ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Quản lý vận chuyển</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{URL::TO('/admin-delivery-all-invoice')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Đơn hàng có thể nhận</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{URL::TO('/admin-delivery-invoice-received')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Đơn hàng đã nhận</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="{{URL::TO('/admin-delivery-invoice-delivered/'.$acc_id)}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Đơn hàng đã giao</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- end menu 2 lv -->
                                        <!-- menu 2 lv -->
                                        <li class="pcoded-hasmenu ">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Quản lý tài khoản</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{URL::TO('/admin-add-account')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Thêm mới</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{URL::TO('/admin-all-account')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Hiển thị</span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- end menu 2 lv -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Quản trị</h5>
                                            <p class="m-b-0">Chào mừng bạn đến với trang quản lý</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="{{URL::TO('/dashboard')}}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Quản trị</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="">
                                            @yield('admin_content')
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/jquery-ui/jquery-ui.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/bootstrap/js/bootstrap.min.js')}} "></script>
    <script type="text/javascript" src="{{asset('public/Backend/assets/pages/widget/excanvas.js')}} "></script>
    <!-- waves js -->
    <script src="{{asset('public/Backend/assets/pages/waves/js/waves.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/jquery-slimscroll/jquery.slimscroll.js')}} "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/modernizr/modernizr.js')}} "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('public/Backend/assets/js/jquery.mCustomScrollbar.concat.min.js')}} "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/chart.js/Chart.js')}}"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="{{asset('public/Backend/assets/pages/widget/amchart/gauge.js')}}"></script>
    <script src="{{asset('public/Backend/assets/pages/widget/amchart/serial.js')}}"></script>
    <script src="{{asset('public/Backend/assets/pages/widget/amchart/light.js')}}"></script>
    <script src="{{asset('public/Backend/assets/pages/widget/amchart/pie.min.js')}}"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="{{asset('public/Backend/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('public/Backend/assets/js/vertical-layout.min.js ')}}"></script>
    <!-- custom js -->
    <!-- <script type="text/javascript" src="{{asset('public/Backend/assets/pages/dashboard/custom-dashboard.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('public/Backend/assets/js/script.js')}} "></script>
    <script>
        "use strict";
        $(document).ready(function() {
            // sale analytics start
            var chart = AmCharts.makeChart("sales-analytics", {
                type: "serial",
                theme: "light",
                // "hideCredits": true,
                marginRight: 40,
                marginLeft: 40,
                autoMarginOffset: 20,
                dataDateFormat: "YYYY-MM-DD",
                valueAxes: [{
                    id: "v1",
                    axisAlpha: 0,
                    position: "left",
                    ignoreAxisWidth: true,
                }, ],
                balloon: {
                    borderThickness: 1,
                    shadowAlpha: 0,
                },
                graphs: [{
                    id: "g1",
                    balloon: {
                        drop: true,
                        adjustBorderColor: false,
                        color: "#ffffff",
                        type: "smoothedLine",
                    },
                    fillAlphas: 0.5,
                    bullet: "round",
                    bulletBorderAlpha: 1,
                    bulletColor: "#FFFFFF",
                    lineColor: "#11c15b",
                    bulletSize: 5,
                    hideBulletsCount: 50,
                    lineThickness: 3,
                    title: "red line",
                    useLineColorForBulletBorder: true,
                    valueField: "Total",
                    balloonText: "<span style='font-size:18px;'>[[Total]] VNĐ</span>",
                }, ],
                chartCursor: {
                    valueLineEnabled: true,
                    valueLineBalloonEnabled: true,
                    cursorAlpha: 0,
                    zoomable: false,
                    valueZoomable: true,
                    valueLineAlpha: 0.5,
                },
                chartScrollbar: {
                    autoGridCount: true,
                    graph: "g1",
                    oppositeAxis: true,
                    scrollbarHeight: 90,
                },
                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    dashLength: 1,
                    minorGridEnabled: true,
                },
                export: {
                    enabled: true,
                },
                dataProvider: [
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "zorbashop");
                    $data = "SELECT sum(`invoice_total`) as `total_day`,`invoice_date_time` FROM `invoice` where `current_status`='Giao hàng thành công' group BY `invoice_date_time`";
                    $resdata = mysqli_query($conn, $data);
                    // $count = "SELECT COUNT(invoice_total) FROM invoice";
                    if ($resdata->num_rows > 0) {
                        // Load dữ liệu lên website
                        while ($rows = $resdata->fetch_assoc()) {
                    ?> {
                                date: "<?php
                                        echo $rows['invoice_date_time'];
                                        ?>",
                                Total: <?php
                                        echo $rows['total_day'];
                                        ?>,
                            },
                    <?php
                        }
                    }
                    ?>
                ],
            });
            var ctx = document.getElementById("this-month").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: avgvalchart(
                    "#11c15b",
                    [30, 15, 25, 35, 30, 20, 25, 30, 15, 1],
                    "#11c15b"
                ),
                options: buildchartoption(),
            });

            function avgvalchart(a, b, f) {
                if (f == null) {
                    f = "rgba(0,0,0,0)";
                }
                return {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                    ],
                    datasets: [{
                        label: "",
                        borderColor: a,
                        borderWidth: 2,
                        hitRadius: 30,
                        pointHoverRadius: 4,
                        pointBorderWidth: 50,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0.1)
                            .rgbString(),
                        fill: true,
                        backgroundColor: f,
                        data: b,
                    }, ],
                };
            }

            function buildchartoption() {
                return {
                    title: {
                        display: !1,
                    },
                    tooltips: {
                        position: "nearest",
                        mode: "index",
                        intersect: false,
                        yPadding: 10,
                        xPadding: 10,
                    },
                    legend: {
                        display: !1,
                        labels: {
                            usePointStyle: !1,
                        },
                    },
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {
                        mode: "index",
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Month",
                            },
                        }, ],
                        yAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Value",
                            },
                            ticks: {
                                beginAtZero: !0,
                            },
                        }, ],
                    },
                    elements: {
                        point: {
                            radius: 4,
                            borderWidth: 12,
                        },
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0,
                        },
                    },
                };
            }
            // sale analytics end
        });
    </script>
    <script>
        "use strict";
        $(document).ready(function() {
            // sale analytics start
            var chart = AmCharts.makeChart("delivery-analytics", {
                type: "serial",
                theme: "light",
                // "hideCredits": true,
                marginRight: 40,
                marginLeft: 40,
                autoMarginOffset: 20,
                dataDateFormat: "YYYY-MM-DD",
                valueAxes: [{
                    id: "v1",
                    axisAlpha: 0,
                    position: "left",
                    ignoreAxisWidth: true,
                }, ],
                balloon: {
                    borderThickness: 1,
                    shadowAlpha: 0,
                },
                graphs: [{
                    id: "g1",
                    balloon: {
                        drop: true,
                        adjustBorderColor: false,
                        color: "#ffffff",
                        type: "smoothedLine",
                    },
                    fillAlphas: 0.5,
                    bullet: "round",
                    bulletBorderAlpha: 1,
                    bulletColor: "#FFFFFF",
                    lineColor: "#11c15b",
                    bulletSize: 5,
                    hideBulletsCount: 50,
                    lineThickness: 3,
                    title: "red line",
                    useLineColorForBulletBorder: true,
                    valueField: "value",
                    balloonText: "<span style='font-size:18px;'>[[value]] đơn</span>",
                }, ],
                chartCursor: {
                    valueLineEnabled: true,
                    valueLineBalloonEnabled: true,
                    cursorAlpha: 0,
                    zoomable: false,
                    valueZoomable: true,
                    valueLineAlpha: 0.5,
                },
                chartScrollbar: {
                    autoGridCount: true,
                    graph: "g1",
                    oppositeAxis: true,
                    scrollbarHeight: 90,
                },
                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    dashLength: 1,
                    minorGridEnabled: true,
                },
                export: {
                    enabled: true,
                },
                dataProvider: [
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "zorbashop");
                    $data = "SELECT count(`invoice_id`) as `total_day`,`invoice_date_time` FROM `invoice` group BY `invoice_date_time`";
                    $resdata = mysqli_query($conn, $data);
                    if ($resdata->num_rows > 0) {
                        // Load dữ liệu lên website
                        while ($rows = $resdata->fetch_assoc()) {
                    ?> {
                                date: "<?php
                                        echo $rows['invoice_date_time'];
                                        ?>",
                                value: <?php
                                        echo $rows['total_day'];
                                        ?>,
                            },
                    <?php
                        }
                    }
                    ?>
                ],
            });
            var ctx = document.getElementById("this-month").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: avgvalchart(
                    "#11c15b",
                    [30, 15, 25, 35, 30, 20, 25, 30, 15, 1],
                    "#11c15b"
                ),
                options: buildchartoption(),
            });

            function avgvalchart(a, b, f) {
                if (f == null) {
                    f = "rgba(0,0,0,0)";
                }
                return {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                    ],
                    datasets: [{
                        label: "",
                        borderColor: a,
                        borderWidth: 2,
                        hitRadius: 30,
                        pointHoverRadius: 4,
                        pointBorderWidth: 50,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0.1)
                            .rgbString(),
                        fill: true,
                        backgroundColor: f,
                        data: b,
                    }, ],
                };
            }

            function buildchartoption() {
                return {
                    title: {
                        display: !1,
                    },
                    tooltips: {
                        position: "nearest",
                        mode: "index",
                        intersect: false,
                        yPadding: 10,
                        xPadding: 10,
                    },
                    legend: {
                        display: !1,
                        labels: {
                            usePointStyle: !1,
                        },
                    },
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {
                        mode: "index",
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Month",
                            },
                        }, ],
                        yAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Value",
                            },
                            ticks: {
                                beginAtZero: !0,
                            },
                        }, ],
                    },
                    elements: {
                        point: {
                            radius: 4,
                            borderWidth: 12,
                        },
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0,
                        },
                    },
                };
            }
            // sale analytics end
        });
    </script>
    <script>
        "use strict";
        $(document).ready(function() {
            // sale analytics start
            var chart = AmCharts.makeChart("book-analytics", {
                type: "serial",
                theme: "light",
                // "hideCredits": true,
                marginRight: 40,
                marginLeft: 40,
                autoMarginOffset: 20,
                dataDateFormat: "YYYY-MM-DD",
                valueAxes: [{
                    id: "v1",
                    axisAlpha: 0,
                    position: "left",
                    ignoreAxisWidth: true,
                }, ],
                balloon: {
                    borderThickness: 1,
                    shadowAlpha: 0,
                },
                graphs: [{
                    id: "g1",
                    balloon: {
                        drop: true,
                        adjustBorderColor: false,
                        color: "#ffffff",
                        type: "smoothedLine",
                    },
                    fillAlphas: 0.5,
                    bullet: "round",
                    bulletBorderAlpha: 1,
                    bulletColor: "#FFFFFF",
                    lineColor: "#11c15b",
                    bulletSize: 5,
                    hideBulletsCount: 50,
                    lineThickness: 3,
                    title: "red line",
                    useLineColorForBulletBorder: true,
                    valueField: "value",
                    balloonText: "<span style='font-size:18px;'>[[value]] đơn</span>",
                }, ],
                chartCursor: {
                    valueLineEnabled: true,
                    valueLineBalloonEnabled: true,
                    cursorAlpha: 0,
                    zoomable: false,
                    valueZoomable: true,
                    valueLineAlpha: 0.5,
                },
                chartScrollbar: {
                    autoGridCount: true,
                    graph: "g1",
                    oppositeAxis: true,
                    scrollbarHeight: 90,
                },
                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    dashLength: 1,
                    minorGridEnabled: true,
                },
                export: {
                    enabled: true,
                },
                dataProvider: [
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "zorbashop");
                    $data = "SELECT count(`invoice_id`) as `total_day`,`invoice_date_time` FROM `invoice` group BY `invoice_date_time`";
                    $resdata = mysqli_query($conn, $data);
                    if ($resdata->num_rows > 0) {
                        // Load dữ liệu lên website
                        while ($rows = $resdata->fetch_assoc()) {
                    ?> {
                                date: "<?php
                                        echo $rows['invoice_date_time'];
                                        ?>",
                                value: <?php
                                        echo $rows['total_day'];
                                        ?>,
                            },
                    <?php
                        }
                    }
                    ?>
                ],
            });
            var ctx = document.getElementById("this-month").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: avgvalchart(
                    "#11c15b",
                    [30, 15, 25, 35, 30, 20, 25, 30, 15, 1],
                    "#11c15b"
                ),
                options: buildchartoption(),
            });

            function avgvalchart(a, b, f) {
                if (f == null) {
                    f = "rgba(0,0,0,0)";
                }
                return {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                    ],
                    datasets: [{
                        label: "",
                        borderColor: a,
                        borderWidth: 2,
                        hitRadius: 30,
                        pointHoverRadius: 4,
                        pointBorderWidth: 50,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0.1)
                            .rgbString(),
                        fill: true,
                        backgroundColor: f,
                        data: b,
                    }, ],
                };
            }

            function buildchartoption() {
                return {
                    title: {
                        display: !1,
                    },
                    tooltips: {
                        position: "nearest",
                        mode: "index",
                        intersect: false,
                        yPadding: 10,
                        xPadding: 10,
                    },
                    legend: {
                        display: !1,
                        labels: {
                            usePointStyle: !1,
                        },
                    },
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {
                        mode: "index",
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Month",
                            },
                        }, ],
                        yAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Value",
                            },
                            ticks: {
                                beginAtZero: !0,
                            },
                        }, ],
                    },
                    elements: {
                        point: {
                            radius: 4,
                            borderWidth: 12,
                        },
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0,
                        },
                    },
                };
            }
            // sale analytics end
        });
    </script>
    <script>
        "use strict";
        $(document).ready(function() {
            // sale analytics start
            var chart = AmCharts.makeChart("book-analytics", {
                type: "serial",
                theme: "light",
                // "hideCredits": true,
                marginRight: 40,
                marginLeft: 40,
                autoMarginOffset: 20,
                dataDateFormat: "YYYY-MM-DD",
                valueAxes: [{
                    id: "v1",
                    axisAlpha: 0,
                    position: "left",
                    ignoreAxisWidth: true,
                }, ],
                balloon: {
                    borderThickness: 1,
                    shadowAlpha: 0,
                },
                graphs: [{
                    id: "g1",
                    balloon: {
                        drop: true,
                        adjustBorderColor: false,
                        color: "#ffffff",
                        type: "smoothedLine",
                    },
                    fillAlphas: 0.5,
                    bullet: "round",
                    bulletBorderAlpha: 1,
                    bulletColor: "#FFFFFF",
                    lineColor: "#11c15b",
                    bulletSize: 5,
                    hideBulletsCount: 50,
                    lineThickness: 3,
                    title: "red line",
                    useLineColorForBulletBorder: true,
                    valueField: "value",
                    balloonText: "<span style='font-size:18px;'>[[value]] sách</span>",
                }, ],
                chartCursor: {
                    valueLineEnabled: true,
                    valueLineBalloonEnabled: true,
                    cursorAlpha: 0,
                    zoomable: false,
                    valueZoomable: true,
                    valueLineAlpha: 0.5,
                },
                chartScrollbar: {
                    autoGridCount: true,
                    graph: "g1",
                    oppositeAxis: true,
                    scrollbarHeight: 90,
                },
                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    dashLength: 1,
                    minorGridEnabled: true,
                },
                export: {
                    enabled: true,
                },
                dataProvider: [
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "zorbashop");
                    $data = "SELECT count(`sell_quantity`) as `total_day`,`invoice_date_time` FROM `invoice` INNER JOIN invoice_detail ON invoice.invoice_id = invoice_detail.invoice_id where `current_status`='Giao hàng thành công' group BY `invoice_date_time`";
                    $resdata = mysqli_query($conn, $data);
                    if ($resdata->num_rows > 0) {
                        // Load dữ liệu lên website
                        while ($rows = $resdata->fetch_assoc()) {
                    ?> {
                                date: "<?php
                                        echo $rows['invoice_date_time'];
                                        ?>",
                                value: <?php
                                        echo $rows['total_day'];
                                        ?>,
                            },
                    <?php
                        }
                    }
                    ?>
                ],
            });
            var ctx = document.getElementById("this-month").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: avgvalchart(
                    "#11c15b",
                    [30, 15, 25, 35, 30, 20, 25, 30, 15, 1],
                    "#11c15b"
                ),
                options: buildchartoption(),
            });

            function avgvalchart(a, b, f) {
                if (f == null) {
                    f = "rgba(0,0,0,0)";
                }
                return {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                    ],
                    datasets: [{
                        label: "",
                        borderColor: a,
                        borderWidth: 2,
                        hitRadius: 30,
                        pointHoverRadius: 4,
                        pointBorderWidth: 50,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0)
                            .rgbString(),
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: Chart.helpers
                            .color("#000000")
                            .alpha(0.1)
                            .rgbString(),
                        fill: true,
                        backgroundColor: f,
                        data: b,
                    }, ],
                };
            }

            function buildchartoption() {
                return {
                    title: {
                        display: !1,
                    },
                    tooltips: {
                        position: "nearest",
                        mode: "index",
                        intersect: false,
                        yPadding: 10,
                        xPadding: 10,
                    },
                    legend: {
                        display: !1,
                        labels: {
                            usePointStyle: !1,
                        },
                    },
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {
                        mode: "index",
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Month",
                            },
                        }, ],
                        yAxes: [{
                            display: !1,
                            gridLines: !1,
                            scaleLabel: {
                                display: !0,
                                labelString: "Value",
                            },
                            ticks: {
                                beginAtZero: !0,
                            },
                        }, ],
                    },
                    elements: {
                        point: {
                            radius: 4,
                            borderWidth: 12,
                        },
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0,
                        },
                    },
                };
            }
            // sale analytics end
        });
    </script>
</body>

</html>