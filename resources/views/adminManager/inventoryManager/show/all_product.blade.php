@extends('adminLayout')
@section('admin_content')
<div class="panel-heading" style="text-align: center; background-color: lightgray;">
  <h2 style="margin: 0;">Tất cả sách</h2>
</div>
<div class="table-agile-info" style="overflow: auto; height: 500px; display: flex;">
  <div class="panel panel-default" style="height: fit-content;">
    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<div class="alert alert-warning alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
      '</div>';
      Session::put('message', null);
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Số trang</th>
            <th>Kích thước</th>
            <th>Ngày xuất bản</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tác giả</th>
            <th>NXB</th>
            <th>Danh mục</th>
            <th>Loại sách</th>
            <th>Trạng thái</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>

          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $product)
          <tr>
            <td>
              <a href="{{URL::TO('/admin-edit-product/'.$product->prod_id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa sách này?`)" href="{{URL::TO('/admin-delete-product/'.$product->prod_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$product->prod_id}}</td>
            <td><span class="text-ellipsis">{{$product->prod_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_numofpages}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_size}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_datepublished}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_price}}</span></td>
            <td><span class="text-ellipsis">{{$product->prod_quantity}}</span></td>
            <td><span class="text-ellipsis">{{$product->author_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->supplier_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->cate_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->type_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->status_name}}</span></td>
            <td><span class="text-ellipsis">{{$product->thumbnail}}</span></td>
            <td><span class="text-ellipsis" style="width:100%; white-space: pre-wrap;overflow: hidden; text-overflow: ellipsis;-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box;">{{$product->prod_desc}}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">

    </footer>
  </div>
</div>
@endsection