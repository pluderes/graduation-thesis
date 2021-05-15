@extends('layout')
@section('content')
<div class="features_items">
	<!--features_items-->
	@foreach($type_name as $key => $type_name)
	<h2 class="title text-center">{{$type_name->type_name}}</h2>
	@endforeach
	@if (\Session::has('message'))
	<div class="alert alert-success alert-dismissable text-center">
		<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button> {!!
		\Session::get('message') !!}
	</div>
	@endif
	@foreach($type_by_id as $key => $prod)
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
								Tạm hết hàng
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
</div>
<!--features_items-->
@endsection