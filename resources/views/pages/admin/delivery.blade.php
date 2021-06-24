@extends('deliveryLayout')
@section('delivery_content')
<h2 style="text-align: center;">Thống kê vận chuyển</h2>
<div class="panel-heading" style="text-align: center;">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h4 class="text-c-purple">{{$total_order}}</h4>
                            <h6 class="text-muted m-b-0">Tổng số đơn hàng</h6>
                        </div>
                        <div class="col-2" style="margin: 0; padding: 0;">
                            <i class="fas fa-file-invoice f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-purple">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% tăng trưởng</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="fa fa-line-chart text-white f-16"></i>
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
                            <h4 class="text-c-green">{{$invoice_delivered}}</h4>
                            <h6 class="text-muted m-b-0">Số đơn đã nhận giao</h6>
                        </div>
                        <div class="col-2">
                            <i class="fas fa-file-invoice-dollar f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% tăng trưởng</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="fa fa-line-chart text-white f-16"></i>
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
                            <h4 class="text-c-red">{{$invoice_success}}</h4>
                            <h6 class="text-muted m-b-0">Số đơn giao hàng thành công</h6>
                        </div>
                        <div class="col-2">
                            <i class="fas fa-file-alt f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-red">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0">% tăng trưởng</p>
                        </div>
                        <div class="col-3 text-right">
                            <i class="fa fa-line-chart text-white f-16"></i>
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
                    <h5>Thống vận chuyển theo ngày</h5>
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
                            <div class="col-8">
                                <h4 class="text-c-blue">{{$invoice_fail}}</h4>
                                <h6 class="text-muted m-b-0">Số đơn giao hàng thất bại</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="far fa-file-alt f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-blue">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">% tăng trưởng</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="fa fa-line-chart text-white f-16"></i>
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
@endsection