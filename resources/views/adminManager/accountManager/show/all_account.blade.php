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
  <div class="panel panel-default">
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:30px;"></th>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Liên hệ</th>
            <th>Hình ảnh</th>
            <th>Mã phân quyền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key => $account)
          <tr>
            <td>
              <a href="{{URL::TO('/admin-edit-account/'.$account->acc_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa tài khoản này?`)" href="{{URL::TO('/admin-delete-account/'.$account->acc_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            <td>{{$account->acc_id}}</td>
            <td><span class="text-ellipsis">{{$account->username}}</span></td>
            <td><span class="text-ellipsis">{{$account->password}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_name}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_email}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_contact}}</span></td>
            <td><span class="text-ellipsis">{{$account->acc_img}}</span></td>
            <td><span class="text-ellipsis">{{$account->perm_id}}</span></td>
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