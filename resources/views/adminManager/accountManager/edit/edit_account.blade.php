@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Cập nhật tài khoản
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_account as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-account/'.$edit_value->acc_id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="userName" name="user_name" value="{{$edit_value->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="passWord">Mật khẩu</label>
                        <input type="text" class="form-control" id="passWord" name="password" value="{{$edit_value->password}}" required>
                    </div>
                    <div class="form-group">
                        <label for="accName">Tên tài khoản</label>
                        <input type="text" class="form-control" id="accName" name="acc_name" value="{{$edit_value->acc_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="accEmail">Email</label>
                        <input type="email" class="form-control" id="accEmail" name="acc_email" value="{{$edit_value->acc_email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="accContact">Liên hệ</label>
                        <input type="text" class="form-control" id="accContact" name="acc_contact" value="{{$edit_value->acc_contact}}" required>
                    </div>
                    <div class="form-group">
                        <textarea id="thumbnail" name="account_thumbnail" cols="100" rows="5" style="display:none">{{$edit_value->acc_img}}</textarea>
                        <label for="accountThumbnail">Hình ảnh</label>
                        <br>
                        <input type="file" name="inpthumbnail" class="form-control" id="accountThumbnail">
                    </div>
                    <div>
                        <label for="permID">ID quyền</label>
                        <br>
                        <select name="perm_id" id="permID">
                            @foreach($perm as $key => $perm_acc)
                            <option value="{{$perm_acc->perm_id}}">{{$perm_acc->perm_id}} - {{$perm_acc->perm_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button id="btnsubmit" type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
<script>
    let inpThumbnail = document.getElementById("accountThumbnail");
    let thumbnail = document.getElementById("thumbnail");
    inpThumbnail.addEventListener("change", function() {
        if (inpThumbnail.value != null) {
            thumbnail.innerHTML = inpThumbnail.value.substring(12, inpThumbnail.length);
        }
        console.log(inpThumbnail);
        console.log(thumbnail);
    });
</script>
@endsection