@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-block mt-3">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-block mt-3">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ session('error') }}</strong>
        </div>
        @endif

        <style>
        input {
            box-sizing: border-box;
            border: 1px solid #82eb82 !important;
        }

        .table {
            table-layout: fixed;
            width: 100%;
            max-height: 80vh;
            /* Set a max height for the table */
            overflow-y: auto;
            /* Enable scrolling inside the table */
        }

        .table th,
        .table td {
            vertical-align: middle;
            border: 1px solid #000;
            padding: 5px;
            /* Reduce padding */
            line-height: 1.2;
            /* Adjust line height */
        }

        .table th {
            color: black;
            font-weight: bold;
        }

        .header {
            background-color: #2e2e61;
            color: #fff;
            text-align: center;
            padding: 10px;
            /* Reduce padding */
        }

        .sub-header {
            background-color: #d3d3d3;
            text-align: center;
            font-weight: bold;
        }

        .logo {
            width: 50px;
        }

        .container {
            max-height: 100vh;
            /* Ensure container height fits screen */
            overflow: hidden;
            /* Prevent page scrolling */
        }

        th>b {
            color: black;
            font-weight: bold;
        }

        .custom-heading {
            color: #5e60a9;
            font-size: 30px;
            text-align: left;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .custom-box {
            width: 100%;
            height: 50vh;
            box-shadow: 5px 7px 18px #162c23;
            text-shadow: 2px 2px 4px rgb(204 147 147 / 60%);
        }
        </style>


        @php
        $next_step_status = $details->progress_status + 1;
        @endphp


        <div class="card" style="background-color:white">
            <div class="d-flex justify-content-between">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"
                        style="background-color: {{($details->progress_status==1 && $details->remark_status==1)?'#f8d7c5':($details->progress_status>=1?'#82e59e':(($next_step_status==1&&$details->remark_status==0)?'#f8d7c5':'#fff'))}}!important">
                        <a class="nav-link {{ ($next_step_status == 1 && $details->remark_status==0)? 'active':(($details->progress_status==1&&$details->remark_status==1)?'active':'')}}"
                            data-toggle="tab" href="#registration_details" role="tab">
                            <span class="hidden-sm-up"></span>
                            <span class="hidden-xs-down">Registration Details</span>
                        </a>
                    </li>
                    <li class="nav-item"
                        style="background-color:  {{($details->progress_status==2&& $details->remark_status==1)?'#f8d7c5':($details->progress_status>=2?'#82e59e':(($next_step_status==2&&$details->remark_status==0)?'#f8d7c5':'#fff'))}}!important">
                        <a class="nav-link {{ ($next_step_status == 2 && $details->remark_status==0)? 'active':(($details->progress_status==2&&$details->remark_status==1)?'active':'')}}"
                            data-toggle="tab" href="#agreement_details" role="tab">
                            <span class="hidden-sm-up"></span>
                            <span class="hidden-xs-down">Agreement Details</span>
                        </a>
                    </li>
                    <li class="nav-item"
                        style="background-color: {{($details->progress_status==3 && $details->remark_status==1)?'#f8d7c5':($details->progress_status>=3?'#82e59e':(($next_step_status==3&&$details->remark_status==0)?'#f8d7c5':'#fff'))}}!important">
                        <a class="nav-link {{ ($next_step_status == 3 && $details->remark_status==0)? 'active':(($details->progress_status==3&&$details->remark_status==1)?'active':'')}}"
                            data-toggle="tab" href="#report_layout" role="tab">
                            <span class="hidden-sm-up"></span>
                            <span class="hidden-xs-down">Report Layout</span>
                        </a>
                    </li>
                    <li class="nav-item"
                        style="background-color: {{($details->progress_status==4 && $details->remark_status==1)?'#f8d7c5':($details->progress_status>=4?'#82e59e':(($next_step_status==4&&$details->remark_status==0)?'#f8d7c5':'#fff'))}}!important">
                        <a class="nav-link {{ ($next_step_status == 4 && $details->remark_status==0)? 'active':(($details->progress_status==4&&$details->remark_status==1)?'active':'')}}"
                            data-toggle="tab" href="#payment_details" role="tab">
                            <span class="hidden-sm-up"></span>
                            <span class="hidden-xs-down">Payments Details</span>
                        </a>
                    </li>
                    <li class="nav-item"
                        style="background-color: {{($details->progress_status==4 && $details->remark_status==1)?'#f8d7c5':($details->progress_status>=4?'#82e59e':'#fff')}}!important">
                        <a class="nav-link {{ ($next_step_status == 5 && $details->remark_status==0)? 'active':($details->progress_status==5?'active':'')}}"
                            data-toggle="tab" href="#completed_details" role="tab">
                            <span class="hidden-sm-up"></span>
                            <span class="hidden-xs-down">Completed</span>
                        </a>
                    </li>
                </ul>
                <button class="btn btn-primary " onclick="goBack()" style="margin-right:25px;">Back</button>
            </div>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane {{ ($next_step_status == 1 && $details->remark_status==0)? 'active':(($details->progress_status==1&&$details->remark_status==1)?'active':'')}}"
                    id="registration_details" role="tabpanel">
                    <div>
                        <div class="card-body">
                            <h2 class="card-title custom-heading">Registration Details</h2>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Reference Id
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>{{$details->reference_id}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Company Name
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label "><b>{{$details->company_name}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Concern
                                    Person Name </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>{{$details->person_name}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Concern
                                    Person Designation </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-6">
                                    <label for="fname"
                                        class="col-sm-8 text-left control-label col-form-label"><b>{{$details->person_designation}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Company
                                    Address </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>{{$details->company_address}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Email
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>{{$details->email}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Phone Number
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>{{$details->phone_number}}</b></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Project Type
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    @php
                                    $p_type = json_decode($details->project_type, true);
                                    @endphp

                                    @if(is_array($p_type))
                                    @foreach($p_type as $p_type_value)
                                    @if($p_type_value == 1)
                                    <label for="fname" class="control-label col-form-label"><b>Address Verification
                                            ,</b></label>
                                    @elseif($p_type_value == 2)
                                    <label for="fname" class="control-label col-form-label"><b>Site
                                            Investigation</b></label>
                                    @endif
                                    @endforeach
                                    @else
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>Invalid project type
                                            data.</p></label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-left control-label col-form-label"
                                    style="padding-left:60px;">Payment Type
                                </label>
                                <div class="col-sm-1 text-center">:</div>
                                <div class="col-sm-8">
                                    @if($details->payment_preference==1)
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>Prepaid</b></label>
                                    @elseif($details->payment_preference==2)
                                    <label for="fname"
                                        class="col-sm-3 text-left control-label col-form-label"><b>Postpaid</b></label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane {{ ($next_step_status == 2 && $details->remark_status==0)? 'active':(($details->progress_status==2&&$details->remark_status==1)?'active':'')}}"
                    id="agreement_details" role="tabpanel">
                    @if($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))
                    <div>
                        @if($details->progress_status==2 && $details->remark_status==1)
                        <div class="alert alert-danger" role="alert">
                            {{$details->remark_message}}
                        </div>
                        @endif
                        <div class="card-body">
                            <form action="{{route('client_agreement')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="remark_status" value="{{$details->remark_status}}">
                                <h4 class="card-title custom-heading">Agreement Details</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Company
                                        Name :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" id="fname" name="company_name"
                                            placeholder="Enter company name.." value="{{$details->a_company_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">CIN
                                        Number :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" id="lname" name="cin_number"
                                            placeholder="Enter CIN Number" value="{{$details->a_cin_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-left control-label col-form-label">Company
                                        Address :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" id="fname" name="company_address"
                                            placeholder="Enter compnay address.."
                                            value="{{$details->a_company_address}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname"
                                        class="col-sm-3 text-left control-label col-form-label">Authorized Signatory
                                        Name :</label>
                                    <div class="col-sm-9">
                                        <inputm
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" id="lname" name="signatory_name"
                                            placeholder="Enter authorized signatory name.."
                                            value="{{$details->a_signatory_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-3 text-left control-label col-form-label">Authorized Signatory
                                        Designation :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" id="email1" name="signatory_designation"
                                            placeholder=" Enter authorized signatory designation.."
                                            value="{{$details->a_signatory_desi}}">
                                    </div>
                                </div>
                                <h4 class="card-title" style=" text-decoration-line: underline;">Case Timeline In Day :
                                </h4>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Case
                                        Timeline :</label>
                                    <div class="col-sm-5">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'number':'hidden'}}"
                                            class="form-control" id="email1" name="case_timeline"
                                            placeholder="Enter Case Timeline.." value="{{$details->a_case_timeline}}">
                                    </div>
                                </div>
                                @php
                                $other_person = json_decode($details->a_other_person_info);
                                @endphp
                                <h4 class="card-title" style=" text-decoration-line: underline;">Escalation Matrix upto
                                    3 level</h4>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">1.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[0]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Contact Number" name="person_phone[]"
                                            value="{{$other_person[0]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'email':'hidden'}}"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[0]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[0]->person_designation}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">2.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[1]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Contact Number" name="person_phone[]"
                                            value="{{$other_person[1]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'email':'hidden'}}"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[1]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[1]->person_designation}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1"
                                        class="col-sm-1 text-right control-label col-form-label">3.</label>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Person Name" name="person_name[]"
                                            value="{{$other_person[2]->person_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Contact Number" name="person_phone[]"
                                            value="{{$other_person[2]->person_phone}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'email':'hidden'}}"
                                            class="form-control" placeholder="Email" name="person_email[]"
                                            value="{{$other_person[2]->person_email}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'text':'hidden'}}"
                                            class="form-control" placeholder="Designation" name="person_designation[]"
                                            value="{{$other_person[2]->person_designation}}">
                                    </div>
                                </div>
                                <h4 class="card-title" style=" text-decoration-line: underline;">Upload Documents </h4>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">PAN Card
                                        :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'file':'hidden'}}"
                                            class="form-control" id="cono1" placeholder="" name="pan_card">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">GST
                                        Certificate :</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'file':'hidden'}}"
                                            class="form-control" id="cono1" placeholder="" name="gst">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Approved
                                        Quotation Documents : </label>
                                    <div class="col-sm-9">
                                        <input
                                            type="{{($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))?'file':'hidden'}}"
                                            class="form-control" id="cono1" placeholder="" name="quotation_doc">
                                    </div>
                                </div>
                                @if($details->progress_status==1||($details->progress_status==2&&$details->remark_status==1))
                                <div class="border-top">
                                    <div class="card-body" style="display:flex;justify-content:end;">
                                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    @else
                    <h1 class="custom-heading">Agreement Details</h1>
                    <div class="container mt-1">
                        <div class="row mt-1">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <tbody>


                                        <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                            <th colspan="12">Basic Details</th>
                                        </tr>
                                        <tr data-id="2">
                                            <th colspan="4" style="width: 33%;">Company Name</th>
                                            <td colspan="8" style="width: 67%;">{{$details->a_company_name}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">CIN Number</th>
                                            <td colspan="8">{{$details->a_cin_number}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">Company Address</th>
                                            <td colspan="8">{{$details->a_company_address}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">Authorized Signatory Name</th>
                                            <td colspan="8">{{$details->a_signatory_name}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">Authorized Signatory Designation</th>
                                            <td colspan="8">{{$details->a_signatory_desi}}</td>
                                        </tr>

                                        <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                            <th colspan="12">Case Timeline In Day</th>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">Case Timeline</th>
                                            <td colspan="8">{{$details->a_case_timeline}}</td>
                                        </tr>
                                        <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                            <th colspan="12">Escalation Matrix upto 3 level</th>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="3">Name</th>
                                            <th colspan="3">Contact Number</th>
                                            <th colspan="3">Email</th>
                                            <th colspan="3">Designation</th>
                                        </tr>
                                        @php
                                        $other_person = json_decode($details->a_other_person_info);
                                        @endphp
                                        <tr data-id="3">
                                            <td colspan="3">{{$other_person[0]->person_name}}</td>
                                            <td colspan="3">{{$other_person[0]->person_phone}}</td>
                                            <td colspan="3">{{$other_person[0]->person_email}}</td>
                                            <td colspan="3">{{$other_person[0]->person_designation}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <td colspan="3">{{$other_person[1]->person_name}}</td>
                                            <td colspan="3">{{$other_person[1]->person_phone}}</td>
                                            <td colspan="3">{{$other_person[1]->person_email}}</td>
                                            <td colspan="3">{{$other_person[1]->person_designation}}</td>
                                        </tr>
                                        <tr data-id="3">
                                            <td colspan="3">{{$other_person[2]->person_name}}</td>
                                            <td colspan="3">{{$other_person[2]->person_phone}}</td>
                                            <td colspan="3">{{$other_person[2]->person_email}}</td>
                                            <td colspan="3">{{$other_person[2]->person_designation}}</td>
                                        </tr>
                                        <tr data-id="1" style="background-color:#cec7c7;text-align:center;">
                                            <th colspan="12">Uploaded Documents</th>
                                        </tr>
                                        <tr data-id="3">
                                            <th colspan="4">Pan Card</th>
                                            <th colspan="4">Gst Documents</th>
                                            <th colspan="4">Approved Quotation Documents </th>
                                        </tr>
                                        <tr data-id="3">
                                            <td colspan="4">
                                                @if($details->a_pan_card!=null)
                                                <a href="{{env('APP_URL').$details->a_pan_card}}" target="_blank">View
                                                    Pancard</a>
                                                @else
                                                No Pan card available.
                                                @endif
                                            </td>
                                            <td colspan="4">
                                                @if($details->a_gst!=null)
                                                <a href="{{env('APP_URL').$details->a_gst}}" target="_blank">View GST
                                                    Certificate</a>
                                                @else
                                                No gst document available!
                                                @endif
                                            </td>
                                            <td colspan="4">
                                                @if($details->a_quotation_doc!=null)
                                                <a href="{{env('APP_URL').$details->a_quotation_doc}}"
                                                    target="_blank">View
                                                    Qutotation Doc</a>
                                                @else
                                                Qutotation document not available
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body" style="display:flex;justify-content:end;">
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane {{ ($next_step_status == 3 && $details->remark_status==0)? 'active':(($details->progress_status==3&&$details->remark_status==1)?'active':'')}} p-20"
                    id="report_layout" role="tabpanel">

                    <div>
                        <h1 class="custom-heading">Report Layout</h1>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr.Num.</th>
                                    <th scope="col">Verification Type</th>
                                    <th scope="col">Layout Selection</th>
                                    <th scope="col">View</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Approve/Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($report_details as $report)
                                <tr style="color:black;">
                                    <td>{{$report->id}}</td>
                                    <td>
                                        @if($report->project_type == 1)
                                        Address Verification
                                        @elseif($report->project_type == 2)
                                        Site Investigation
                                        @else
                                        Digital Address Verification
                                        @endif
                                    </td>
                                    <td>
                                        @if($report->layout_type == 1)
                                        Default
                                        @else
                                        Custom
                                        @endif
                                    </td>
                                    <td class="text-center"><a
                                            href="{{route('report', ['id' => $report->id , 'layout_type' => $report->layout_type, 'layout_status' => $report->layout_status ] )}}"><button
                                                class="btn btn-secondary btn-sm">View</button></a></td>
                                    <td class="text-center">
                                        @if($report->layout_status == 1)
                                        <button class="btn btn-warning btn-sm">Pending</button>
                                        @elseif($report->layout_status == 2)
                                        <button class="btn btn-success btn-sm">Approved</button>
                                        @elseif($report->layout_status == 3)
                                        <button class="btn btn-danger btn-sm">Edit</button>
                                        @else
                                        <button class="btn btn-secondary btn-sm">Unknown</button>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($report->layout_type == 2)
                                         <a  href="{{route('report', ['id' => $report->id , 'layout_type' => 1, 'layout_status' => $report->layout_status ] )}}"><button class="btn btn-primary btn-sm">Default Layout</button></a>
                                        @else
                                        <a  href="{{route('getuploadupdate', ['id' => $report->id])}}"><button class="btn btn-primary btn-sm">Custom Layout</button></a>
                                         <!--<a  data-toggle="modal" data-target="#rejectModal_{{$report->id}}"><button class="btn btn-primary btn-sm">Custom Layout</button></a>-->
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="tab-pane {{ ($next_step_status == 4 && $details->remark_status==0)? 'active':(($details->progress_status==4&&$details->remark_status==1)?'active':'')}} p-20"
                    id="payment_details" role="tabpanel">
                    <div class="p-20">
                        <h1 class="custom-heading">Payment Details</h1>
                        @if($details->progress_status>=4)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.Num.</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Charge(per case)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Address Verification</td>
                                    <td>{{$details->address_charge}} ₹</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Site Investigation Charge</td>
                                    <td>{{$details->site_charge}} ₹</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Digital Verification</td>
                                    <td>{{$details->digital_charge}} ₹</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <div class="row">
                            <div class=" col-lg-3"> </div>
                            <div
                                class=" col-lg-6 custom-box d-flex flex-column justify-content-center align-items-center">
                                <h4>Waiting for admin to update verification charges..</h4>
                            </div>
                            <div class=" col-lg-3"> </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane {{ ($next_step_status == 5 && $details->remark_status==0)? 'active':($details->progress_status==5?'active':'')}} p-20"
                    id="completed_details" role="tabpanel">
                    <div class="p-20">
                        @if($details->progress_status==4&&$details->remark_status==0)
                        <div class="row">
                            <div class=" col-lg-3"> </div>
                            <div
                                class=" col-lg-6 custom-box d-flex flex-column justify-content-center align-items-center">
                                <h1>Congratulations..</h1>
                                <h3>You have successfully onboarded.</h3>
                            </div>
                            <div class=" col-lg-3"> </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!---->
    </div>
</div>
</div>

<script>

</script>
<!--</div>-->
@endsection