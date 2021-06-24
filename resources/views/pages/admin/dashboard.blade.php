@extends('adminLayout')
@section('admin_content')
<h2 style="text-align: center;">Thống kê doanh thu</h2>
<div class="panel-heading" style="text-align: center;">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-purple" style="margin: 0;">{{number_format((int)$total_price_invoice)}} VNĐ</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fa fa-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-purple">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Tổng doanh thu</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-green" style="margin: 0;">{{$total_prod_invoice}}</h4>
                        </div>
                        <div class="col-2">
                            <i class="fa fa-book f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số lượng sách bán ra</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="color: lightsalmon; margin: 0;">{{$total_order}}</h4>

                        </div>
                        <div class="col-2">
                            <i class="fa fa-calendar-check-o f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: lightsalmon;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Tổng lượt đặt hàng</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- task, page, download counter  end -->

        <!--  sale analytics start -->
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê doanh thu theo ngày</h5>
                    <!-- <span class="text-muted">Get 15% Off on <a href="https://www.amcharts.com/" target="_blank">amCharts</a> licences. Use code "codedthemes" and get the discount.</span> -->
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
                    <div id="sales-analytics" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="">
                <div class="card">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h4 class="text-c-red" style="margin: 0;">{{$total_quantity_prod}}</h4>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-book f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <p class="text-white m-b-0">Số sách tồn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card quater-card">
                <div class="card-block">
                    <h6 class="text-muted m-b-15">Thống kê tháng này</h6>
                    <h4>{{number_format($total_month)}} VNĐ</h4>
                    <p class="text-muted">Tổng doanh thu</p>
                    <h5>{{$online_revenue}}</h5>
                    <p class="text-muted">Doanh thu trực tuyến<span class="f-right">{{$online_revenue/($online_revenue + $offline_revenue) * 100}}%</span></p>
                    <div class="progress">
                        <div class="progress-bar bg-c-blue" style="width: <?php
                                                                            echo $online_revenue / ($online_revenue + $offline_revenue) * 100;
                                                                            ?>%"></div>
                    </div>
                    <h5 class="m-t-15">{{$offline_revenue}}</h5>
                    <p class="text-muted">Doanh thu ngoại tuyến<span class="f-right">{{$offline_revenue/($online_revenue + $offline_revenue) * 100}}%</span></p>
                    <div class="progress">
                        <div class="progress-bar bg-c-green" style="width: <?php
                                                                            echo $offline_revenue / ($online_revenue + $offline_revenue) * 100;
                                                                            ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--  sale analytics end -->
    </div>
</div>
<hr>

<h2 style="text-align: center;">Thống kê đơn hàng</h2>
<div class="panel-heading" style="text-align: center;">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-purple" style="margin: 0;">{{$total_order}}</h4>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-file-invoice f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-purple">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Tổng số đơn hàng</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-green" style="margin: 0;">{{$invoice_delivered}}</h4>
                        </div>
                        <div class="col-2">
                            <i class="fas fa-file-invoice-dollar f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số đơn đã nhận giao</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c" style="color: lightsalmon; margin: 0;">{{$invoice_success}}</h4>
                        </div>
                        <div class="col-2">
                            <i class="fas fa-file-alt f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c" style="background-color: lightsalmon;">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="text-white m-b-0">Số đơn giao hàng thành công</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- task, page, download counter  end -->

        <!--  sale analytics start -->
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê vận chuyển theo ngày</h5>
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
                    <div id="delivery-analytics" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="">
                <div class="card">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h4 class="text-c-red">{{$invoice_fail}}</h4>
                            </div>
                            <div class="col-2">
                                <i class="far fa-file-alt f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <p class="text-white m-b-0">Số đơn giao hàng thất bại</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card quater-card">
                <div class="card-block">
                    <h6 class="text-muted m-b-15">Thống kê tháng này</h6>
                    <h4>{{$total_order_month}}</h4>
                    <p class="text-muted">Tổng đơn đặt hàng</p>
                    <h5>{{$total_success_month}}</h5>
                    <p class="text-muted">Số đơn giao hàng thành công<span class="f-right">{{$total_success_month / $total_order_month * 100}} %</span></p>
                    <div class="progress">
                        <div class="progress-bar bg-c-blue" style="width: <?php
                                                                            echo $total_success_month / $total_order_month * 100;
                                                                            ?>%"></div>
                    </div>
                    <h5 class="m-t-15">{{$total_fail_month}}</h5>
                    <p class="text-muted">Số đơn giao hàng thất bại<span class="f-right">{{$total_fail_month / $total_order_month * 100}} %</span></p>
                    <div class="progress">
                        <div class="progress-bar bg-c-green" style="width: <?php
                                                                            echo $total_fail_month / $total_order_month * 100;
                                                                            ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--  sale analytics end -->
    </div>
</div>
<hr>

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
    <h3 style="text-align: center;">Thống kê sách bán ra theo danh mục</h3>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
                            <i class="fas fa-list-ol f-28"></i>
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
    <h3 style="text-align: center;">Thống kê sách bán ra theo ngày</h3>
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