@extends('inventoryLayout')
@section('inventory_content')

<div class="table-agile-info">
  <div class="panel panel-default">
  <div class="panel-heading" style="text-align: center; background-color: lightgray;">
  <h2 style="margin: 0;">Danh sách nhà xuất bản</h2>
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
            <th>Mã NXB</th>
            <th>Tên nhà cuất bản</th>
            <th>Liên hệ</th>
            <th>Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_supplier as $key => $supplier)
          <tr>
            <td>
              <a href="{{URL::TO('/edit-supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa NXB này?`)" href="{{URL::TO('/delete-supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$supplier->supplier_id}}</td>
            <td><span class="text-ellipsis">{{$supplier->supplier_name}}</span></td>
            <td><span class="text-ellipsis">{{$supplier->supplier_contact}}</span></td>
            <td><span class="text-ellipsis">{{$supplier->supplier_addr}}</span></td>
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