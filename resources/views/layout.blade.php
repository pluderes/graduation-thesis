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

	<!-- script -->
	<script src="{{asset('public/Frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/Frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/Frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/Frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/Frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/Frontend/js/main.js')}}"></script>
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
					<div class="col-sm-2">
						<div class="logo pull-left">
							<a href="{{URL::TO('/trang-chu')}}"><img src="{{asset('public/Upload/banner/zorbashop.png')}}" style="width: 150px;" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-10" style="max-height: 100%; margin-top: 25px;">
						<div class="col-6">
							<div class="mainmenu pull-left">
								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href="{{URL::TO('/trang-chu')}}" class="active"><i class="fas fa-home"></i> Trang ch???</a></li>
									<li class="dropdown"><a href="#">Danh m???c s??ch<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											@foreach($category as $key => $cate)
											<li class="dropdown"><a href="{{URL::TO('/category-product/'.$cate->cate_id)}}">{{$cate->cate_name}}</a>
											</li>
											@endforeach
										</ul>
									</li>
									<li><a href="{{URL::TO('/aboutus')}}"><i class="fa fa-phone"></i> Li??n h???</a></li>
								</ul>
							</div>
						</div>
						<div class="col-6">
							<div class="mainmenu pull-right">
								<ul class="nav navbar-nav">
									<li><a href="{{URL::TO('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Gi??? h??ng</a></li>
									<?php
									$acc_id = Session::get('acc_id');
									$deli_id = Session::get('deli_id'); ?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/info/'.$acc_id)}}"><i class="fa fa-user"></i> T??i kho???n</a></li>
										<li><a href="{{URL::TO('/wishlist/'.$acc_id)}}"><i class="fa fa-star"></i> Y??u th??ch</a></li>
										<li><a href="{{URL::TO('/adminLogout')}}"><i class="fas fa-sign-out-alt"></i> ????ng xu???t</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/adminLogin')}}"><i class="fa fa-user"></i> T??i kho???n</a></li>
										<li><a href="{{URL::TO('/adminLogin')}}"><i class="fa fa-star"></i> Y??u th??ch</a></li>
										<li><a href="{{URL::TO('/adminLogin')}}"><i class="fas fa-sign-in-alt"></i> ????ng nh???p</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->
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
							<h2>T??nh tr???ng s??ch</h2>
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
							<h2>Danh m???c s??ch</h2>
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
							<h2>Lo???i s??ch</h2>
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
							<h2>D???ch v???</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">H??? tr??? tr???c tuy???n</a></li>
								<li><a href="{{URL::TO('/aboutus')}}">Li??n h??? v???i ch??ng t??i</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Nh???n th??ng b??o</h2>
							<form action="{{URL::TO('/send-email')}}" class="searchform" method="get">
								{{csrf_field()}}
								<input type="text" placeholder="?????a ch??? email c???a b???n" name="sendmail" />
								<button type="submit" class="btn btn-default"><i class="fas fa-arrow-alt-circle-right"></i></button>
								<p>G???i l???i email c???a b???n ????? nh???n nh???ng ??u ????i m???i nh???t</p>
							</form>
						</div>
					</div>
					<!-- <div class="col-sm-2">
						<h1>dasdas</h1>
					</div> -->
					<div class="col-sm-6">
						<div class="single-widget">
							<h2>?????a ch???</h2>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d763.8155633086945!2d105.72391582915975!3d19.784608261109742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDQ3JzA0LjYiTiAxMDXCsDQzJzI4LjEiRQ!5e1!3m2!1svi!2s!4v1621562776592!5m2!1svi!2s" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="text-center">Designed by <span><a target="_blank" href="https://www.facebook.com/pluderes/">Trung ?????c</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->

	<script>
		const sort = document.getElementById("sort");
		sort.onchange = () => {
			let url = sort.value;
			if (url) {
				window.location = url;
				console.dir(sort);
			}
			return false;
		}
	</script>
</body>

</html>