@extends('inventoryLayout')
@section('inventory_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center; background-color: lightgray;">
      <h2 style="margin: 0;">Tình trạng sách</h2>
    </div>
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
            <th>Mã tình trạng</th>
            <th>Tình trạng sách</th>
            <th>Mô tả</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_status as $key => $status)
          <tr>
            <td>
              <a href="{{URL::TO('/edit-status/'.$status->status_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa tình trạng sách này?`)" href="{{URL::TO('/delete-status/'.$status->status_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$status->status_id}}</td>
            <td><span class="text-ellipsis">{{$status->status_name}}</span></td>
            <td><span class="text-ellipsis">{{$status->status_desc}}</span></td>
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