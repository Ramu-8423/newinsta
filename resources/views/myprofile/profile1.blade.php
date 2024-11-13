@extends('admin.body.adminmaster')

@section('admin')
    <!--<div class="container">-->
     <link rel="stylesheet" href="assets/css/profile1.css">
    
        <div id="main-wrapper" style="margin-top: -1%;">
        <div class="page-wrapper">
        <div class="container-fluid">
       
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


 
        

        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">INSTA LOCATE</h3>
                            <!--<h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>-->
                            <!--<p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>-->
                            <div class="row about-list">
    <div class="col-md-12">
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Concern Person Name:</span>
                <span>Akhilesh Yadav</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Concern Person Designation:</span>
                <span>Developer</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Address:</span>
                <span>Canada</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Project Type:</span>
                <span>Site Visit</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Payment Preference:</span>
                <span>Prepaid</span>
            </li>
    <!--    </ul>-->
    <!--</div>-->
    <!--<div class="col-md-6">-->
    <!--    <ul class="list-group mb-3">-->
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">E-mail:</span>
                <span>info@domain.com</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="font-weight-bold">Phone:</span>
                <span>820-885-3321</span>
            </li>
        </ul>
    </div>
</div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                <p class="m-0px font-w-600">Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                <p class="m-0px font-w-600">Project Completed</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                <p class="m-0px font-w-600">Photo Capture</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                <p class="m-0px font-w-600">Telephonic Talk</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="counter mt-4">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                <p class="m-0px font-w-600">Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                <p class="m-0px font-w-600">Project Completed</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                <p class="m-0px font-w-600">Photo Capture</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                <p class="m-0px font-w-600">Telephonic Talk</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>
<!--</div>-->


@endsection