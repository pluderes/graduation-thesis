<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Zorba Shop</title>
	<link href="{{asset('public/Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/Frontend/css/responsive.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/Frontend/css/style1.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/Frontend/images/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/Frontend/images/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/Frontend/images/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('public/Frontend/images/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 35 92 80808</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> kingofpoppro@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::TO('/trang-chu')}}"><img src="{{asset('public/Upload/banner/zorbashop.png')}}" style="width: 150px;" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right" style="margin-top: 20px;">
							<ul class="nav navbar-nav">
								<li><a href="{{URL::TO('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
								$acc_id = Session::get('acc_id');
								$deli_id = Session::get('deli_id'); ?>
								<?php
								if ($acc_id != NULL) {
								?>
									<li><a href="{{URL::TO('/info/'.$acc_id)}}"><i class="fa fa-user"></i> Tài khoản</a></li>
									<li><a href="{{URL::TO('/wishlist/'.$acc_id)}}"><i class="fa fa-star"></i> Yêu thích</a></li>
									<?php
									if ($deli_id == NULL) {
									?>
										<li><a href="{{URL::TO('/checkout/'.$acc_id)}}"><i class="far fa-credit-card"></i> Thanh toán</a></li>
									<?php
									} else if ($deli_id != NULL) {
									?>
										<li><a href="{{URL::TO('/payment')}}"><i class="far fa-credit-card"></i> Thanh toán</a></li>
									<?php
									}
									?>
									<li><a href="{{URL::TO('/adminLogout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
								<?php
								} else {
								?>
									<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
									<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-star"></i> Yêu thích</a></li>
									<li><a href="{{URL::TO('/login-checkout')}}"><i class="far fa-credit-card"></i> Thanh toán</a></li>
									<li><a href="{{URL::TO('/adminLogin')}}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::TO('/trang-chu')}}" class="active"><i class="fas fa-home"></i> Trang chủ</a></li>
								<li class="dropdown"><a href="#">Danh mục sản phẩm<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach($category as $key => $cate)
										<li class="dropdown"><a href="{{URL::TO('/danhmucsanpham/'.$cate->cate_id)}}">{{$cate->cate_name}}</a>
										</li>
										@endforeach
									</ul>
								</li>
								<li><a href="{{URL::TO('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><a href="contact-us.html"><i class="fa fa-phone"></i> Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{URL::to('/tim-kiem')}}" method="get">
								{{csrf_field()}}
								<input type="text" class="sb-text" name="keywords_submit" placeholder="Search">
								<button class="sb-sbm" type="submit" name="search_items" id="search">
									<i class="fas fa-search"></i>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-bottom-->
	</header>
	<!--/header-->

	<section id="slider">
		<!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div id="itemactive" class="item active">
								<img src="{{asset('public/Upload/banner/banner1.jpg')}}" alt="" />
							</div>
							<div id="item1" class="item">

								<img src="{{asset('public/Upload/banner/banner2.jpg')}}" alt="" />

							</div>
							<div id="item2" class="item">

								<img src="{{asset('public/Upload/banner/banner3.jpg')}}" alt="" />

							</div>
							<div id="item3" class="item">

								<img src="{{asset('public/Upload/banner/banner4.jpg')}}" alt="" />

							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<!--status_products-->
						<div class="brands_products">
							<h2>Tình trạng sách</h2>
							<div class="brands-name">
								@foreach($status_prod as $key => $status_prod)
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URL::TO('/status-product/'.$status_prod->status_id)}}">{{$status_prod->status_name}}</a></li>
								</ul>
								@endforeach
							</div>
						</div>
						<!--/status_products-->
						<br>
						<div class="category_product">
							<h2>Danh mục sách</h2>
							<div class="panel-group category-products" id="accordian">
								<!--category-productsr-->
								@foreach($category as $key => $cate)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::TO('/category-product/'.$cate->cate_id)}}">{{$cate->cate_name}}</a></h4>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!--/category-products-->
						<br>
						<div class="category_product">
							<h2>Loại sách</h2>
							<div class="panel-group category-products" id="accordian">
								<!--category-productsr-->
								@foreach($prod_type as $key => $type)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::TO('/type-product/'.$type->type_id)}}">{{$type->type_name}}</a></h4>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!--/category-products-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ với chúng tôi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Nhận thông báo</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Địa chỉ email của bạn" />
								<button type="submit" class="btn btn-default"><i class="fas fa-arrow-alt-circle-right"></i></button>
								<p>Gửi lại email của bạn để nhận những ưu đãi mới nhất</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->



	<script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/Frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/Frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/Frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/Frontend/js/main.js')}}"></script>
</body>

</html>