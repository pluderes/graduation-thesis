@extends('adminLayout')
@section('admin_content')
<!--  project and team member start -->
<div class="col-xl-8 col-md-12">
    <div class="card table-card">
        <div class="card-header">
            <h5>Projects</h5>
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="chk-option">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon fa fa-check txt-default"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                Assigned
                            </th>
                            <th>Name</th>
                            <th>Due Date</th>
                            <th class="text-right">Priority</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="chk-option">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label class="check-task">
                                            <input type="checkbox" value="">
                                            <span class="cr">
                                                <i class="cr-icon fa fa-check txt-default"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-inline-block align-middle">
                                    <img src="{{asset('public/Backend/assets/images/avatar-4.jpg')}}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>John Deo</h6>
                                        <p class="text-muted m-b-0">Graphics Designer</p>
                                    </div>
                                </div>
                            </td>
                            <td>Able Pro</td>
                            <td>Jun, 26</td>
                            <td class="text-right"><label class="label label-danger">Low</label></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right m-r-20">
                    <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-md-12">
    <div class="card ">
        <div class="card-header">
            <h5>Team Members</h5>
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
            <div class="align-middle m-b-30">
                <img src="{{asset('public/Backend/assets/images/avatar-2.jpg')}}" alt="user image" class="img-radius img-40 align-top m-r-15">
                <div class="d-inline-block">
                    <h6>David Jones</h6>
                    <p class="text-muted m-b-0">Developer</p>
                </div>
            </div>

            <div class="text-center">
                <a href="#!" class="b-b-primary text-primary">View all Projects</a>
            </div>
        </div>
    </div>
</div>
<!--  project and team member end -->
@endsection