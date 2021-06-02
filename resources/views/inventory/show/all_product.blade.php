@extends('inventoryLayout')
@section('inventory_content')
<div class="panel-heading" style="text-align: center;">
  <h2 style="margin: 0;">Tất cả sách</h2>
</div>
<div class="table-agile-info" style="overflow: auto; width: 1080px; height: 500px; display: flex;">
  <div class="panel panel-default">
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
              <a href="{{URL::TO('/edit-product/'.$product->prod_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa danh mục này?`)" href="{{URL::TO('/delete-product/'.$product->prod_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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

    </footer>
  </div>
</div>
@endsection