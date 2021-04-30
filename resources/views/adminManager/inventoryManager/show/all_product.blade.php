@extends('adminLayout')
@section('admin_content')
<div class="table-agile-info" style="overflow: auto; width: 1080px; height: 500px; display: flex;">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Danh sách sách
    </div>
    <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
    <div class="row w3-res-tb">
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn" style="margin-left: 5px;">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>ID sách</th>
            <th>Tên sách</th>
            <th>Mô tả</th>
            <th>Số trang</th>
            <th>Kích thước</th>
            <th>Ngày xuất bản</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>ID trạng thái</th>
            <th>ID tác giả</th>
            <th>ID NXB</th>
            <th>Hình ảnh</th>
            <th>ID loại sách</th>

          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $product)
          <tr>
          <td>
              <a href="{{URL::TO('/admin-edit-product/'.$product->prod_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa danh mục này?`)" href="{{URL::TO('/admin-delete-product/'.$product->prod_id)}}"class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$product->prod_id}}</td>
            <td><span class="text-ellipsis">{{$product->prod_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_desc}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_numofpages}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_size}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_datepublished}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_price}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_quantity}}</span></td>
            <td><span class="text-ellipsis">{{$product->status_id}}</span></td>
            <td><span class="text-ellipsis">{{$product->author_id}}</span></td>
            <td><span class="text-ellipsis">{{$product->supplier_id}}</span></td>
            <td><span class="text-ellipsis">{{$product->thumbnail}}</span></td>
            <td><span class="text-ellipsis">{{$product->type_id}}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection