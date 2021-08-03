@extends('layout')
@section('content')
<section id="introduce" class="section-padding">
	<div class="row">
		<div class="col-sm-8">
			<form action="{{URL::to('/sort')}}" method="get">
				{{csrf_field()}}
				<label for="sort">Sắp xếp:</label>
				<select id="sort" name="sort" style="max-width: max-content;">
					<option value="{{Request::URL()}}?sort=unset">---</option>
					<option value="{{Request::URL()}}?sort=sale">Đang giảm giá</option>
					<option value="{{Request::URL()}}?sort=new">Sản phẩm mới</option>
					<option value="{{Request::URL()}}?sort=desc">Giá giảm dần</option>
					<option value="{{Request::URL()}}?sort=asc">Giá tăng dần</option>
				</select>
			</form>
		</div>
		<div class="search_box col-sm-4">
			<form action="{{URL::to('/tim-kiem')}}" method="get">
				{{csrf_field()}}
				<div class="pull-right" style="margin-right: 15px;">
					<input type="text" class="sb-text" name="keywords_submit" placeholder="Tìm kiếm">
					<button class="sb-sbm" type="submit" name="search_items" id="search">
						<i class="fas fa-search"></i>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="text-center">
		<?php
		$keywords = Session::get('keywords');
		?>
		<h2 class="title">Kết quả tìm kiếm:
			<?php
			echo $keywords;
			?>
		</h2>
		<?php
		$count_product = Session::get('count_product');
		$count_author = Session::get('count_author');
		$message = Session::get('search_error');
		if ($message) {
			echo '<div class="alert alert-danger alert-dismissable text-center">
			<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
			'</div>';
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
										if ($prod->status_id == 4) {
									?>
											<img src="{{asset('public/Upload/banner/new.png')}}" id="new" alt="" />
										<?php
										}
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
										if ($prod->status_id == 4) {
									?>
											<img src="{{asset('public/Upload/banner/new.png')}}" id="new" alt="" />
										<?php
										}
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
										if ($prod->status_id == 4) {
									?>
											<img src="{{asset('public/Upload/banner/new.png')}}" id="new" alt="" />
										<?php
										}
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
										if ($prod->status_id == 4) {
									?>
											<img src="{{asset('public/Upload/banner/new.png')}}" id="new" alt="" />
										<?php
										}
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
										if ($prod->status_id == 4) {
									?>
											<img src="{{asset('public/Upload/banner/new.png')}}" id="new" alt="" />
										<?php
										}
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