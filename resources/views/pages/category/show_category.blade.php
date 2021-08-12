@extends('layout')
@section('content')
<div class="features_items">
    <!--features_items-->
    @foreach($category_name as $key => $category_name)
    <h2 class="title text-center">{{$category_name->cate_name}}</h2>
    @endforeach
    <div class="row">
        <div class="col-sm-8">
            <form action="{{URL::to('/sort')}}" method="get">
                {{csrf_field()}}
                <label for="sort">Sắp xếp:</label>
                <select id="sort" name="sort" style="max-width: max-content;">
                    <option value="{{Request::URL()}}?sort=unset">---</option>
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
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
        '</div>';
        Session::put('message', null);
    }
    ?>
    @foreach($cate_by_id as $key => $prod)
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
    <div class="pagination col-sm-12">
        <div style="text-align: center;">
            {!! $cate_by_id->links() !!}
        </div>
    </div>
</div>
<!--features_items-->
@endsection