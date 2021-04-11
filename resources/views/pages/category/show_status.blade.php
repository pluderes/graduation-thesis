@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        @foreach($status_name as $key => $status_name)
						<h2 class="title text-center">{{$status_name->status_name}}</h2>
                        @endforeach
                        @foreach($status_by_id as $key => $prod)
                        <a href="{{URL::TO('/chitietsanpham/'.$prod->prod_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="width: 200px; height: 300px;" src="{{URL::TO('public/Upload/product/'.$prod->thumbnail)}}" alt="" />
											<h2>{{number_format($prod->prod_price)}} VND</h2>
											<p style="height: 50px;">{{$prod->prod_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
                                            <h2>{{number_format($prod->prod_price)}} VND</h2>
											<p style="height: 50px;">{{$prod->prod_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
											</div>
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
					</div><!--features_items-->
@endsection