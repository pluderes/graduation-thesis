@extends('inventoryLayout')
@section('inventory_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading" style="text-align: center; background-color: lightgray;">
            Thêm danh loại sách
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
                <form role="form" action="{{URL::TO('/save-type')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categoryName">Tên danh mục</label>
                        <input type="text" class="form-control" id="categoryName" name="type_name">
                    </div>
                    <div class="form-group">
                        <label for="categoryDesc">Mô tả</label>
                        <br>
                        <textarea name="type_desc" id="categoryDesc" cols="100" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="cateID">Danh mục sách</label>
                        <br>
                        <select name="cate_id" id="cateID">
                            @foreach($category as $key => $cate)
                            <option value="{{$cate->cate_id}}">{{$cate->cate_id}} - {{$cate->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection