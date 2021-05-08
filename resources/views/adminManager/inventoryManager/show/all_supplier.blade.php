@extends('adminLayout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Danh sách nhà xuất bản
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
            <th>ID NXB</th>
            <th>Tên nhà cuất bản</th>
            <th>Liên hệ</th>
            <th>Địa chỉ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_supplier as $key => $supplier)
          <tr>
            <td>
              <a href="{{URL::TO('/admin-edit-supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa danh mục này?`)" href="{{URL::TO('/admin-delete-supplier/'.$supplier->supplier_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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