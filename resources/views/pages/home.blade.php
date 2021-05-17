@extends('layout')
@section('content')
<!-- <div class="features_items"> -->
	<!--features_items-->
	<h2 class="title text-center">Sản phẩm mới</h2>
	@if (\Session::has('message'))
	<div class="alert alert-success alert-dismissable text-center">
		<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button> {!!
		\Session::get('message') !!}
	</div>
	@endif
	@foreach($new_product as $key => $prod)
	<a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
						<?php
                        if ($prod->status_id != 3) {
                        ?>
                        <h2><br></h2>
                        <h2>{{number_format($prod->prod_price)}} VND</h2>
                        <?php
                        } else {
                        ?>
                        <h2 style="text-decoration: line-through; color: gray;">{{number_format($prod->prod_price)}} VND</h2>
                        <h2>{{number_format($prod->prod_price - ($prod->prod_price *5 / 100))}} VND</h2>
                        <?php
                        }
                        ?>
						<p style="height: 50px;">{{$prod->prod_name}}</p>
						<form action="{{URL::TO('/save-cart')}}" method="POST">
							{{csrf_field()}}
							<button type="submit" class="btn btn-fefault cart">
								<i class="fa fa-shopping-cart"></i>
								Thêm vào giỏ hàng
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
	<div class="pagination">
        <div style="text-align: center;">
            {!! $new_product->links() !!}
        </div>
    </div>

<!-- </div> -->
<!--features_items-->
@endsection