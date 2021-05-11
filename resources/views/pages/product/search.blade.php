@extends('layout')
@section('content')

<section id="introduce" class="section-padding">
	<div class="text-center">
		<h2 class="title" style="color: lightcoral;">Search result</h2>
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
							<button type="submit" class="btn btn-fefault cart"
								<?php if ($prod->prod_quantity == '0') { 
                                ?> 
                                disabled><i class="fa fa-shopping-cart"></i>
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
						</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
						</ul>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	</div>

</section>

@endsection