@extends('inventoryLayout')
@section('inventory_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Loại sách
    </div>
    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<span style="color:red; font-weight:bold">', $message, '</span>';
      Session::put('message', null);
    }
    ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>ID loại</th>
            <th>Tên loại</th>
            <th>Mô tả</th>
            <th>ID danh mục</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_type as $key => $type)
          <tr>
            <td>
              <a href="{{URL::TO('/edit-type/'.$type->type_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa loại sách này?`)" href="{{URL::TO('/delete-type/'.$type->type_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$type->type_id}}</td>
            <td><span class="text-ellipsis">{{$type->type_name}}</span></td>
            <td><span class="text-ellipsis">{{$type->type_desc}}</span></td>
            <td>{{$type->cate_id}}</td>
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