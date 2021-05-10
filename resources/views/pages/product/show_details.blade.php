@extends('layout')
@section('content')
@foreach($detais_product as $key => $values)
@foreach($author_product as $key => $author_prod)
@foreach($supplier_product as $key => $supplier_prod)
<div class="product-details">
	<!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img style="height: 500px;" src="{{URL::TO('public/Upload/product/'.$values->thumbnail)}}" alt="" />
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information">
			<!--/product-information-->
			<h2>{{$values->prod_name}}</h2>
			<hr>
			<p><b>Tác giả:</b> {{$author_prod->author_name}}</p>
			<p><b>NXB:</b> {{$supplier_prod->supplier_name}}</p>
			<p><b>Số trang:</b> {{$values->prod_numofpages}}</p>
			<p><b>Kích thước:</b> {{$values->prod_size}}</p>
			<p><b>Ngày phát hành:</b> {{ \Carbon\Carbon::parse($values->prod_datepublished)->format('d/m/Y')}}</p>
			<form action="{{URL::TO('/save-cart')}}" method="POST">
				{{csrf_field()}}
				<span>
					<span>Giá bìa: {{number_format($values->prod_price)}} VND</span>
					<div>
						<label>Số lượng:</label>
						<input name="prod_quantity" type="number" min="1" max="{{($values->prod_quantity)}}" value="1" />
						<input name="prod_id_hidden" type="hidden" value="{{($values->prod_id)}}" />
						<button type="submit" class="btn btn-fefault cart" 
						<?php 
						if($values->prod_quantity=0){
							echo 'disabled';
						?>
						<?php	
						}else {
						?>
						<?php
							
						}
						?>
						><i class="fa fa-shopping-cart"></i>
							Thêm vào giỏ hàng
						</button>
					</div>
				</span>
			</form>
			<a href=""><img src="{{asset('public/Frontend/images/share.png')}}" class="share img-responsive" alt="" /></a>
		</div>
		<!--/product-information-->
	</div>
</div>
@endforeach
@endforeach
@endforeach
<!--/product-details-->
<div class="category-tab shop-details-tab">
	<!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#reviews" data-toggle="tab">Giới thiệu</a></li>
			<li><a href="#tag" data-toggle="tab">Sản phẩm tương tự</a></li>
		</ul>
	</div>
	<div class="tab-content">

		<div class="tab-pane fade active in" id="reviews">
			<div class="col-sm-12">
				@foreach($detais_product as $key => $values)
				<p>{{$values->prod_desc}}</p>
				@endforeach
			</div>
		</div>
		<div class="tab-pane fade" id="tag">
			@foreach($prod_cate as $key => $prod_by_cate)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod_by_cate->thumbnail)}}" alt="" />
							<h2>{{number_format($prod_by_cate->prod_price)}} VND</h2>
							<p style="height: 50px;">{{$prod_by_cate->prod_name}}</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!--/category-tab-->

<div class="recommended_items">
	<!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				@foreach($prod_status as $key => $prod_by_status)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img style="width: 200px; height: 300px;" src="images/home/recommend1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="item">
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/recommend1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
<!--/recommended_items-->
@endsection