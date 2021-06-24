@extends('inventoryLayout')
@section('inventory_content')
<h2 style="text-align: center;">Thống kê sách</h2>
<div class="panel-heading" style="text-align: center;">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-purple" style="margin: 0;">{{$total_prod}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-book f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-purple">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Tổng số sách tồn</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #C8C6A7;">{{$total_author}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-pen-nib f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #C8C6A7;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số tác giả</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #92967D;">{{$total_cate}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ol f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #92967D;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số danh mục sách</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #6E7C7C;">{{$total_type}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #6E7C7C;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số loại sách</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- dang mục -->
    <h2 style="text-align: center;">Thống kê sách bán ra theo danh mục</h2>
    <div class="row">
        <!-- task, page, download counter  end -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #865858;">{{$VN}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #865858;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Văn học Việt Nam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #8E7F7F;">{{$foreign}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #8E7F7F;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Văn học nước ngoài</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #aba1a1;">{{$children}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #aba1a1;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Thiếu nhi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #c7adad;">{{$politics}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #c7adad;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Thời sự - Chính trị</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #F39189;">{{$natural_sciences}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #F39189;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Khoa học tự nhiên - Nhân văn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #BB8082;">{{$reference}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #BB8082;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Sách tham khảo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="margin: 0; color: #BB8082;">{{$reprint}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-list-ul f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: #BB8082;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Sách tái bản</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <h2 style="text-align: center;">Thống kê sách bán ra theo ngày</h2>
    <div class="row">
        <!--  sale analytics start -->
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thống số sách bán ra theo ngày</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div id="book-analytics" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card quater-card">
                <div class="card-block">
                    <h6 class="text-muted m-b-15">Thống kê tháng này</h6>
                    <h4>{{$total_sell_month}}</h4>
                    <p class="text-muted">Tổng sách bán ra</p>
                </div>
            </div>
        </div>
        <!--  sale analytics end -->
    </div>
</div>
@endsection