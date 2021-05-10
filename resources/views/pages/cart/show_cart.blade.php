@extends('layout')
@section('content')

<section id="cart_items">
	<div class="">
		<div class="breadcrumbs">
			<ol class="breadcrumb" style="margin-bottom: 20px;">
				<li><a href="{{URL::TO('/trang-chu')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php
			$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<?php
					$message = Session::get('warning');
					if ($message) {
						echo '<span style="color:red; font-weight:bold">', $message, '</span>';
						Session::put('warning', null);
					}
					?>
					<?php
					$message = Session::get('error');
					if ($message) {
						echo '<span style="color:red; font-weight:bold">', $message, '</span>';
						Session::put('error', null);
					}
					?>
					<tr class="cart_menu">
						<td class="image">Sách</td>
						<td class="description">Tên</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td class="delete"></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $value_content)
					<tr>
						<td id="cart_product">
							<a href="{{URL::TO('/chitietsanpham/'.$value_content->id)}}"><img id="imgdetail" src="{{URL::TO('public/Upload/product/'.$value_content->options->image)}}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4 style="margin-top: -10px;"><a href="{{URL::TO('/chitietsanpham/'.$value_content->id)}}">{{$value_content->name}}</a></h4>
						</td>
						<td class=" cart_price">
							<p>{{number_format($value_content->price)}} VND</p>
						</td>
						<td class="cart_quantity">
							<form action="{{URL::TO('/update-quantity')}}" method="POST">
								{{csrf_field()}}
								<div class="cart_quantity_button">
									<input id="inp_qty" class="cart_quantity_input" type="number" name="cart_quantity" value="{{$value_content->qty}}" min="1" max="{{($value_content->weight)}}">
									<input class="cart_quantity_input" type="hidden" name="rowId_cart" value="{{$value_content->rowId}}">
									<input type="hidden" name="prod_id" value="{{$value_content->id}}">
									<button style="background-color: seagreen; color: seashell;" type="submit" name="update_qty" class="btn btn-default btn-sm">Cập nhật</button>
								</div>
							</form>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?php
								$subtotal = $value_content->price * $value_content->qty;
								echo number_format($subtotal) . ' VND';
								?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::TO('/delete-to-cart/'.$value_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--/#cart_items-->
<section id="do_action">
	<div class="container" style="padding-left: 0;">
		<div class="heading">
			<h4>Thanh toán</h4>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{Cart::subtotal()}} VND</span></li>
						<li>Thuế <span>{{Cart::tax()}} VND</span></li>
						<li>Phí vận chuyển <span>Free</span></li>
						<li>Thành tiền <span>{{Cart::total()}} VND</span></li>
					</ul>
					<!-- <a class="btn btn-default update" href="">Update</a> -->
					<?php
					$acc_id = Session::get('acc_id');
					if ($acc_id != NULL) {
					?>
						<form action="{{URL::TO('/checkout/'.$acc_id)}}" method="get">
							{{csrf_field()}}
							@foreach($content as $value_content)
							<input id="inp_qty" class="cart_quantity_input" type="hidden" name="cart_quantity" value="{{$value_content->qty}}" min="1" max="{{($value_content->weight)}}">
							<input class="cart_quantity_input" type="hidden" name="rowId_cart" value="{{$value_content->rowId}}">
							<input type="hidden" name="prod_id" value="{{$value_content->id}}">
							@endforeach
							<button class="btn btn-default check_out" type="submit">Thanh toán</button>
						</form>
					<?php
					} else {
					?>
						<form action="{{URL::TO('/login-checkout')}}" method="get">
							{{csrf_field()}}
							@foreach($content as $value_content)
							<input id="inp_qty" class="cart_quantity_input" type="hidden" name="cart_quantity" value="{{$value_content->qty}}" min="1" max="{{($value_content->weight)}}">
							<input class="cart_quantity_input" type="hidden" name="rowId_cart" value="{{$value_content->rowId}}">
							<input type="hidden" name="prod_id" value="{{$value_content->id}}">
							@endforeach
							<button class="btn btn-default check_out" type="submit">Thanh toán</button>
						</form>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#do_action-->
@endsection