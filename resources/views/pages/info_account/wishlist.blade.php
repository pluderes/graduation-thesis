@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Danh sách yêu thích của bạn</h2>
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
        '</div>';
        Session::put('message', null);
    }
    ?>
    @foreach($wishlist as $key => $prod)
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
                        <li><a href="{{URL::TO('/delete-prod-wishlist/'.$prod->prod_id)}}"><i class="fas fa-minus-square"></i>Bỏ yêu thích</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    <div class="pagination">
        <div style="text-align: center;">
            {!! $wishlist->links() !!}
        </div>
    </div>
</div>
<!--features_items-->
@endsection