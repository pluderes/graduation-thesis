@extends('adminLayout')
@section('admin_content')
<div class="panel-heading" style="text-align: center; background-color: lightgray;">
  <h2 style="margin: 0;">Loại sách</h2>
</div>
<div class="table-agile-info">
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
            <th>Mã loại sách</th>
            <th>Tên loại</th>
            <th>Mô tả</th>
            <th>Danh mục</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_type as $key => $type)
          <tr>
            <td>
              <a href="{{URL::TO('/admin-edit-type/'.$type->type_id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa loại sách này?`)" href="{{URL::TO('/admin-delete-type/'.$type->type_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$type->type_id}}</td>
            <td><span class="text-ellipsis">{{$type->type_name}}</span></td>
            <td><span class="text-ellipsis">{{$type->type_desc}}</span></td>
            <td>{{$type->cate_name}}</td>

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