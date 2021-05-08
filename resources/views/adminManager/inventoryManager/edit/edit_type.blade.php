@extends('adminLayout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Cập nhật loại sách
        </header>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color:red; font-weight:bold">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            @foreach($edit_type as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::TO('/admin-update-type/'.$edit_value->type_id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="typeName">Tên loại sách</label>
                        <input type="text" class="form-control" id="typeName" name="type_name" value="{{$edit_value->type_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="typeDesc">Mô tả</label>
                        <br>
                        <textarea name="type_desc" id="typeDesc" cols="100" rows="5" required>{{$edit_value->type_desc}}</textarea>
                    </div>
                    <div>
                        <select name="cate_id" id="">
                            @foreach($category as $key => $cate)
                            <option value="{{$cate->cate_id}}">{{$cate->cate_id}} - {{$cate->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection