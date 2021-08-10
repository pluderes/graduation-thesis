@extends('adminLayout')
@section('admin_content')
<header class="panel-heading" style="text-align: center; background-color: lightgray;">
  <h2 style="margin: 0;">Danh sách tài khoản</h2>
</header>
<?php
$message = Session::get('message');
if ($message) {
  echo '<div class="alert alert-danger alert-dismissable text-center">
						<button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>', $message,
  '</div>';
  Session::put('message', null);
}
?>
<div class="table-agile-info" style="overflow: auto; height: 500px; display: flex;">
  <div class="panel panel-default" style="height: fit-content;">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Phân quyền</th>
            <th>Mật khẩu</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Liên hệ</th>
            <th>Hình ảnh</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key => $account)
          <tr>
            <td>
              <a href="{{URL::TO('/admin-edit-account/'.$account->acc_id)}}" class="active" ui-toggle-class=""><i class="fas fa-edit"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa tài khoản này?`)" href="{{URL::TO('/admin-delete-account/'.$account->acc_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$account->acc_id}}</td>
            <td><span class="text-ellipsis">{{$account->username}}</span></td>
            <td><span class="text-ellipsis">{{$account->perm_name}}</span></td>
            <td><span class="text-ellipsis">{{$account->password}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_name}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_email}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_contact}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_img}}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<hr>
<div style="text-align: center;">
  <h2>Bảng phân quyền</h2>
  <div class="table-agile-info" style="display: flex; justify-content: center;">
    <div class="panel panel-default" style="height: fit-content;">
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Mã phân quyền</th>
              <th>Tên phân quyền</th>
            </tr>
          </thead>
          <tbody>
            @foreach($permission as $key => $perm)
            <tr>
              <td>{{$perm->perm_id}}</td>
              <td><span class="text-ellipsis">{{$perm->perm_name}}</span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection