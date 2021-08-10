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
			<p><b>Thể loại:</b> {{$values->type_name}}</p>
			<p><b>Danh mục:</b> {{$values->cate_name}}</p>
			<p><b>Ngày phát hành:</b> {{ \Carbon\Carbon::parse($values->prod_datepublished)->format('d/m/Y')}}</p>
			<form action="{{URL::TO('/save-cart')}}" method="POST">
				{{csrf_field()}}
				<span>
					<span>Giá bìa: {{number_format($values->prod_price)}} VND</span>
					<div>
						<label>Số lượng:</label>
						<input name="prod_quantity" type="number" min="1" max="{{($values->prod_quantity)}}" value="1" />
						<input name="prod_id_hidden" type="hidden" value="{{($values->prod_id)}}" />
						<button type="submit" class="btn btn-fefault cart" style="margin-bottom: 5px;" <?php if ($values->prod_quantity == '0') {
																										?> disabled><i class="fa fa-shopping-cart"></i>
							Sản phẩm tạm hết hàng
						<?php } else {
						?>
							><i class="fa fa-shopping-cart"></i>
							Thêm vào giỏ hàng
						<?php }
						?>
						</button>
					</div>
				</span>
			</form>
			<!-- <a href=""><img src="{{asset('public/Frontend/images/share.png')}}" class="share img-responsive" alt="" /></a> -->
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
			<a href="{{URL::TO('/chitietsanpham/'.$prod_by_cate->prod_id)}}">
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod_by_cate->thumbnail)}}" alt="" />
								<?php
								if ($prod_by_cate->status_id != 3) {
								?>
									<h2><br></h2>
									<h2>{{number_format($prod_by_cate->prod_price)}} VND</h2>
								<?php
								} else {
								?>
									<h2 style="text-decoration: line-through; color: gray;">{{number_format($prod_by_cate->prod_price)}} VND</h2>
									<h2>{{number_format($prod_by_cate->prod_price - ($prod_by_cate->prod_price *5 / 100))}} VND</h2>
								<?php
								}
								?>
								<p style="height: 50px;">{{$prod_by_cate->prod_name}}</p>
								<form action="{{URL::TO('/save-cart')}}" method="POST">
									{{csrf_field()}}
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
									<input name="prod_quantity" type="hidden" value="1" />
									<input name="prod_id_hidden" type="hidden" value="{{($prod_by_cate->prod_id)}}" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
<!--/category-tab-->

<div class="recommended_items">
	<!--recommended_items-->
	<h2 class="title text-center">Sản phẩm gợi ý</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="">
				@foreach($prod_status as $key => $prod_by_status)
				<a href="{{URL::TO('/chitietsanpham/'.$prod_by_status->prod_id)}}">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod_by_status->thumbnail)}}" alt="" />
									<?php
									if ($prod_by_status->status_id != 3) {
									?>
										<h2><br></h2>
										<h2>{{number_format($prod_by_status->prod_price)}} VND</h2>
									<?php
									} else {
									?>
										<h2 style="text-decoration: line-through; color: gray;">{{number_format($prod_by_status->prod_price)}} VND</h2>
										<h2>{{number_format($prod_by_status->prod_price - ($prod_by_status->prod_price *5 / 100))}} VND</h2>
									<?php
									}
									?>
									<p style="height: 50px;">{{$prod_by_status->prod_name}}</p>
									<form action="{{URL::TO('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										</button>
										<input name="prod_quantity" type="hidden" value="1" />
										<input name="prod_id_hidden" type="hidden" value="{{($prod_by_status->prod_id)}}" />
									</form>
									<?php
									if ($prod_by_status->status_id != 3) {
										if ($prod_by_status->status_id == 4) {
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
						</div>
					</div>
				</a>
				@endforeach
			</div>
			<div class="pagination col-sm-12">
				<div style="text-align: center;">
					{!! $prod_status->links() !!}
				</div>
			</div>
			<!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a> -->
		</div>
	</div>
	<!--/recommended_items-->
	@endsection