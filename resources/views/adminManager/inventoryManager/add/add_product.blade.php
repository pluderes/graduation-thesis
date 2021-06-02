@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            <h2 style="margin: 0;">Thêm sách mới</h2>
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="alert alert-success alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
                '</div>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-save-product')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="productName">Tên sách</label>
                        <input type="text" class="form-control" id="productName" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="productDesc">Mô tả</label>
                        <br>
                        <textarea name="product_desc" id="productDesc" cols="100" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productNumofpages">Số trang</label>
                        <input type="text" class="form-control" id="productNumofpages" name="product_numofpages" required>
                    </div>
                    <div class="form-group">
                        <label for="productSize">Kích thước</label>
                        <input type="text" class="form-control" id="productSize" name="product_size" required>
                    </div>
                    <div class="form-group">
                        <label for="productDatepublished">Ngày xuất bản</label>
                        <input type="date" class="form-control" id="productDatepublished" name="product_datepublished" required>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Giá</label>
                        <input type="text" class="form-control" id="productPrice" name="product_price" required>
                    </div>
                    <div class="form-group">
                        <label for="productQuantity">Số lượng</label>
                        <input type="text" class="form-control" id="productQuantity" name="product_quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="statusID">Mã trạng thái</label>
                        <br>
                        <select name="status_id" id="statusID">
                            @foreach($status as $key => $status_prod)
                            <option value="{{$status_prod->status_id}}">{{$status_prod->status_id}} - {{$status_prod->status_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="authorID">Mã tác giả</label>
                        <br>
                        <select name="author_id" id="authorID">
                            @foreach($author as $key => $author_prod)
                            <option value="{{$author_prod->author_id}}">{{$author_prod->author_id}} - {{$author_prod->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="supplierID">Mã nhà xuất bản</label>
                        <br>
                        <select name="supplier_id" id="supplierID">
                            @foreach($supplier as $key => $supplier_prod)
                            <option value="{{$supplier_prod->supplier_id}}">{{$supplier_prod->supplier_id}} - {{$supplier_prod->supplier_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="typeID">Mã loại sách</label>
                        <br>
                        <select name="type_id" id="typeID">
                            @foreach($type as $key => $type_prod)
                            <option value="{{$type_prod->type_id}}">{{$type_prod->type_id}} - {{$type_prod->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productThumbnail">Hình ảnh</label>
                        <br>
                        <input type="file" name="product_thumbnail" class="form-control" id="productThumbnail">
                    </div>
                    <br>
                    <button id="btnsubmit" type="submit" class="btn btn-info">Xác nhận</button>
                </form>
                <button style="margin-top: 10px;" id="btnback" type="submit" class="btn btn-info" onclick="goBack()">Trở về</button>
            </div>
        </div>
    </section>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection