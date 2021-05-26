@extends('layout')
@section('content')
<section id="introduce" class="section-padding">
	<div class="text-center">
		<h2 class="title" style="color: lightcoral;">Kết quả tìm kiếm</h2>
		<?php
		$count_product = Session::get('count_product');
		$count_author = Session::get('count_author');
		$message = Session::get('search_error');
		if ($message) {
			echo '<span style="color:red; font-weight:bold">', $message, '</span>';
			Session::put('search_error', null);
		?>
			<br>
			<img src="{{asset('public/Upload/banner/oops.png')}}" alt="">
		<?php
		} else {
		?>
			<?php
			if ($count_author !== 0 && $count_product === 0) {
			?>
				@foreach($search_author as $key => $prod)
				<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
									<h2>{{number_format($prod->prod_price)}} VND</h2>
									<p style="height: 50px;">{{$prod->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart" <?php if ($prod->prod_quantity == '0') {
																							?> disabled><i class="fa fa-shopping-cart"></i>
											Sản phẩm tạm hết hàng
										<?php } else {
										?>
											><i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										<?php }
										?>
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod->prod_id)}}" />
									</form>
									<?php
									if ($prod->status_id != 3) {
									?>

									<?php
									} else {
									?>
										<img src="{{asset('public/Upload/banner/sale5.png')}}" id="saleoff" alt="" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php
									$acc_id = Session::get('acc_id');
									?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/add-wishlist/'.$prod->prod_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			<?php
			} else if ($count_author === 0 && $count_product !== 0) {
			?>
				@foreach($search_product as $key => $prod)
				<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
									<h2>{{number_format($prod->prod_price)}} VND</h2>
									<p style="height: 50px;">{{$prod->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart" <?php if ($prod->prod_quantity == '0') {
																							?> disabled><i class="fa fa-shopping-cart"></i>
											Sản phẩm tạm hết hàng
										<?php } else {
										?>
											><i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										<?php }
										?>
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod->prod_id)}}" />
									</form>
									<?php
									if ($prod->status_id != 3) {
									?>

									<?php
									} else {
									?>
										<img src="{{asset('public/Upload/banner/sale5.png')}}" id="saleoff" alt="" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php
									$acc_id = Session::get('acc_id');
									?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/add-wishlist/'.$prod->prod_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			<?php
			} else if ($count_author !== 0 && $count_product !== 0) {
			?>
				@foreach($search_author as $key => $prod)
				<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
									<h2>{{number_format($prod->prod_price)}} VND</h2>
									<p style="height: 50px;">{{$prod->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart" <?php if ($prod->prod_quantity == '0') {
																							?> disabled><i class="fa fa-shopping-cart"></i>
											Sản phẩm tạm hết hàng
										<?php } else {
										?>
											><i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										<?php }
										?>
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod->prod_id)}}" />
									</form>
									<?php
									if ($prod->status_id != 3) {
									?>

									<?php
									} else {
									?>
										<img src="{{asset('public/Upload/banner/sale5.png')}}" id="saleoff" alt="" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php
									$acc_id = Session::get('acc_id');
									?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/add-wishlist/'.$prod->prod_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</a>
				@endforeach
				@foreach($search_product as $key => $prod)
				<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
									<h2>{{number_format($prod->prod_price)}} VND</h2>
									<p style="height: 50px;">{{$prod->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart" <?php if ($prod->prod_quantity == '0') {
																							?> disabled><i class="fa fa-shopping-cart"></i>
											Sản phẩm tạm hết hàng
										<?php } else {
										?>
											><i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										<?php }
										?>
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod->prod_id)}}" />
									</form>
									<?php
									if ($prod->status_id != 3) {
									?>

									<?php
									} else {
									?>
										<img src="{{asset('public/Upload/banner/sale5.png')}}" id="saleoff" alt="" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php
									$acc_id = Session::get('acc_id');
									?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/add-wishlist/'.$prod->prod_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			<?php
			} else if ($count_author === 0 && $count_product === 0) {
			?>
				@foreach($search_product as $key => $prod)
				<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
									<h2>{{number_format($prod->prod_price)}} VND</h2>
									<p style="height: 50px;">{{$prod->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart" <?php if ($prod->prod_quantity == '0') {
																							?> disabled><i class="fa fa-shopping-cart"></i>
											Sản phẩm tạm hết hàng
										<?php } else {
										?>
											><i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										<?php }
										?>
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod->prod_id)}}" />
									</form>
									<?php
									if ($prod->status_id != 3) {
									?>

									<?php
									} else {
									?>
										<img src="{{asset('public/Upload/banner/sale5.png')}}" id="saleoff" alt="" />
									<?php
									}
									?>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php
									$acc_id = Session::get('acc_id');
									?>
									<?php
									if ($acc_id != NULL) {
									?>
										<li><a href="{{URL::TO('/add-wishlist/'.$prod->prod_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									} else {
									?>
										<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			<?php
			}
			?>
		<?php
		}
		?>

	</div>
</section>
<br>
<div class="pagination col-sm-12">
	<div style="text-align: center;">
		<?php
		if ($count_author !== 0 && $count_product === 0) {
		?>
			{!! $search_author->links() !!}
		<?php
		} else if ($count_author === 0 && $count_product !== 0) {
		?>
			{!! $search_product->links() !!}
		<?php
		} else if ($count_author !== 0 && $count_product !== 0) {
		?>
			{!! $search_product->links() !!}
		<?php
		} else if ($count_author === 0 && $count_product === 0) {
		?>
			{!! $search_product->links() !!}
		<?php
		}
		?>
	</div>
</div>
@endsection