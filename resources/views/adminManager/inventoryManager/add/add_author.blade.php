@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Thêm tác giả
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-save-author')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="authorName">Tên tác giả</label>
                        <input type="text" class="form-control" id="authorName" name="author_name" required>
                    </div>
                    <div class="form-group">
                        <label for="authorDesc">Thông tin</label>
                        <br>
                        <textarea name="author_desc" id="authorDesc" cols="100" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection