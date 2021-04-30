@extends('layout')
@section('content')

<section id="cart_items">
    <div class="">
        <div class="breadcrumbs">
            <ol class="breadcrumb" style="margin: 0;">
                <li><a href="{{URL::TO('/trang-chu')}}">Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <div class="review-payment">
            <h2 style="margin-top: 20px;">Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">

            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
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
                                <img id="imgdetail" src="{{URL::TO('public/Upload/product/'.$value_content->options->image)}}" alt="">
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$value_content->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($value_content->price)}} VND</p>
                            </td>
                            <td class="cart_quantity">
                                <form action="{{URL::TO('/update-quantity')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="cart_quantity_button">
                                        <input id="inp_qty" class="cart_quantity_input" type="number" name="cart_quantity" value="{{$value_content->qty}}" min="1">
                                        <input class="cart_quantity_input" type="hidden" name="rowId_cart" value="{{$value_content->rowId}}">
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
    </div>
</section>
<!--/#cart_items-->
<section id="do_action">
    <div class="container" style="padding-left: 0;">
        <div class="heading">
            <h4>Thanh toán</h4>
        </div>
        <div class="">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::subtotal()}} VND</span></li>
                        <li>Thuế <span>{{Cart::tax()}} VND</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total()}} VND</span></li>
                    </ul>
                    <h4 style="margin-left: 40px;">Lựa chọn hình thức thanh toán</h4>
                    <form action="{{URL::TO('/order-place')}}" method="POST">
                        {{csrf_field()}}
                        <div class="payment-options">
                            <span>
                                <label><input name="payment_option" value="1" type="radio" /> Thanh toán bằng thẻ ATM</label>
                            </span>
                            <span>
                                <label><input name="payment_option" value="2" type="radio" /> Thanh toán khi nhận hàng</label>
                            </span>
                        </div>
                        <input name="send_order_place" class="btn btn-default check_out" type="submit" value="Đặt hàng"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->
@endsection