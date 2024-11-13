@extends('admin.body.adminmaster')

@section('admin')
    <div class="container">
        <br>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif



<link rel="stylesheet" href="assets/css/profilecss.css">

    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://gravatar.com/avatar/31b64e4876d603ce78e04102c67d6144?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" 
                    class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Jason Davis
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					{{-- <button type="button" class="btn btn-success btn-sm">Follow</button> --}}
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                <strong>Company Name - Insatalocate</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                <strong>Email Address - instalocate@gmail.com</strong>

                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-ok"></i>
                                <strong>Mobile Number - 1234567890</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                <strong>Company Address - Lucknow</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                <strong>Company Project Type -Site visit</strong>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                <strong>Payment Preference - Prepaid</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                
				<!-- END MENU -->
			   
                                            {{-- <div class="portlet light bordered">
                                                <!-- STAT -->
                                                <div class="row list-separated profile-stat">
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 37 </div>
                                                        <div class="uppercase profile-stat-text"> Projects </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 51 </div>
                                                        <div class="uppercase profile-stat-text"> Tasks </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 61 </div>
                                                        <div class="uppercase profile-stat-text"> Uploads </div>
                                                    </div>
                                                </div>
                                                <!-- END STAT -->
                                                 <div>
                                                    <h4 class="profile-desc-title">About Jason Davis</h4>
                                                    <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="https://www.apollowebstudio.com">apollowebstudio.com</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-twitter"></i>
                                                        <a href="https://www.twitter.com/jasondavisfl/">@jasondavisfl</a>
                                                    </div>
                                                    <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-facebook"></i>
                                                        <a href="https://www.facebook.com/">JasonDavisFL</a>
                                                    </div>
                                                </div>
                                            </div>                    --}}
                                           
        
        
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-4 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cart-plus m-b-5 font-16"></i></h1>
                                <h5 class="text-white m-b-0 m-t-5">2540</h5>
                                <h6 class="text-white">Wallet</h6>
                            </div>
                        </div>
                    </div>
                
                    <!-- Column -->
                    <div class="col-md-4 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="fa fa-user m-b-5 font-16"></i></h1>
                                <h5 class="text-white m-b-0 m-t-5">2540</h5>
                                <h6 class="text-white">Total Users</h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
        
                    <div class="col-md-4 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fa fa-plus m-b-5 font-16"></i></h1>
                                <h5 class="text-white m-b-0 m-t-5">120</h5>
                                <h6 class="text-white">New Users</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-4 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cart-plus m-b-5 font-16"></i></h1>
                                <h5 class="text-white m-b-0 m-t-5">656</h5>
                                <h6 class="text-white">Total Shop</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-tag m-b-5 font-16"></i></h1>
                                <h5 class=" text-white m-b-0 m-t-5">100</h5>
                                <h6 class="text-white">Total Orders</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                </div>
            </div>
		</div>
	</div>


@endsection