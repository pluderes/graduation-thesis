@extends('inventoryLayout')
@section('inventory_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Thêm sách
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::TO('/save-product')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="productName">Tên sách</label>
                        <input type="text" class="form-control" id="productName" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="productDesc">Mô tả</label>
                        <br>
                        <textarea name="product_desc" id="productDesc" cols="100" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productNumofpages">Số trang</label>
                        <input type="text" class="form-control" id="productNumofpages" name="product_numofpages">
                    </div>
                    <div class="form-group">
                        <label for="productSize">Kích thước</label>
                        <input type="text" class="form-control" id="productSize" name="product_size">
                    </div>
                    <div class="form-group">
                        <label for="productDatepublished">Ngày xuất bản</label>
                        <input type="date" class="form-control" id="productDatepublished" name="product_datepublished">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Giá</label>
                        <input type="text" class="form-control" id="productPrice" name="product_price">
                    </div>
                    <div class="form-group">
                        <label for="productQuantity">Số lượng</label>
                        <input type="text" class="form-control" id="productQuantity" name="product_quantity">
                    </div>
                    <div class="form-group">
                        <label for="statusID">ID trạng thái</label>
                        <br>
                        <select name="status_id" id="statusID">
                            @foreach($status as $key => $status_prod)
                            <option value="{{$status_prod->status_id}}">{{$status_prod->status_id}} - {{$status_prod->status_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="authorID">ID tác giả</label>
                        <br>
                        <select name="author_id" id="authorID">
                            @foreach($author as $key => $author_prod)
                            <option value="{{$author_prod->author_id}}">{{$author_prod->author_id}} - {{$author_prod->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplierID">ID nhà cung cấp</label>
                        <br>
                        <select name="supplier_id" id="supplierID">
                            @foreach($supplier as $key => $supplier_prod)
                            <option value="{{$supplier_prod->supplier_id}}">{{$supplier_prod->supplier_id}} - {{$supplier_prod->supplier_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productThumbnail">Hình ảnh</label>
                        <br>
                        <textarea name="product_thumbnail" id="productThumbnail" cols="100" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="typeID">Loại sách</label>
                        <br>
                        <select name="type_id" id="typeID">
                            @foreach($type as $key => $type_prod)
                            <option value="{{$type_prod->type_id}}">{{$type_prod->type_id}} - {{$type_prod->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection