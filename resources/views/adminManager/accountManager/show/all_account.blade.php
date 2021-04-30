@extends('adminLayout')
@section('admin_content')
<div class="table-agile-info" style="overflow: auto; width: 1080px; height: 500px; display: flex;">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      Danh sách tài khoản
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
            <th>ID tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Liên hệ</th>
            <th>Hình ảnh</th>
            <th>ID quyền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key => $account)
          <tr>
          <td>
              <a href="{{URL::TO('/admin-edit-account/'.$account->acc_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm(`Bạn có chắc muốn xóa tài khoản này?`)" href="{{URL::TO('/admin-delete-account/'.$account->acc_id)}}"class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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