@extends('orderLayout')
@section('order_content')
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
                    <?php
                    if (($online_revenue + $offline_revenue) > 0) {
                    ?>
                        <p class="text-muted">Doanh thu trực tuyến<span class="f-right">{{$online_revenue/($online_revenue + $offline_revenue) * 100}}%</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-c-blue" style="width:
                             <?php
                                echo $online_revenue / ($online_revenue + $offline_revenue) * 100;
                                ?>%">
                            </div>
                        </div>
                        <h5 class="m-t-15">{{$offline_revenue}}</h5>
                        <p class="text-muted">Doanh thu ngoại tuyến<span class="f-right">{{$offline_revenue/($online_revenue + $offline_revenue) * 100}}%</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-c-green" style="width: 
                            <?php
                            echo $offline_revenue / ($online_revenue + $offline_revenue) * 100;
                            ?>%">
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <p class="text-muted">Doanh thu trực tuyến<span class="f-right">0 %</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-c-blue" style="width: 
                                <?php
                                echo 0;
                                ?>%">
                            </div>
                        </div>
                        <h5 class="m-t-15">{{$total_fail_month}}</h5>
                        <p class="text-muted">Doanh thu ngoại tuyến<span class="f-right">0 %</span></p>
                        <div class="progress">
                            <div class="progress-bar bg-c-green" style="width: 
                                <?php
                                echo 0;
                                ?>%">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--  sale analytics end -->
    </div>
</div>
@endsection