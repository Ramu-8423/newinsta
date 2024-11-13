<!--{{-- resources/views/user/userlist.blade.php --}}-->

@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        <h1>User List</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('adduser') }}" class="btn btn-info" style="margin-bottom: 20px;">Add User</a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client and Vendor Details</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Case ID</strong></th>
                                        <th scope="col"><strong>Client Name</strong></th>
                                        <th scope="col"><strong>Client ID</strong></th>
                                        <th scope="col"><strong>Client Location</strong></th>
                                        <th scope="col"><strong>Project Type</strong></th>
                                        <th scope="col"><strong>Candidate Name</strong></th>
                                        <th scope="col"><strong>Mobile</strong></th>
                                        <th scope="col"><strong>Email</strong></th>
                                        <th scope="col"><strong>Father Name</strong></th>
                                        <th scope="col"><strong>Mother Name</strong></th>
                                        <th scope="col"><strong>Allocation Date</strong></th>
                                        <th scope="col"><strong>Ageing</strong></th>
                                        <th scope="col"><strong>Address type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Peroid Of Stay From</strong></th>
                                        <th scope="col"><strong>Peroid Of Stay TO</strong></th>
                                        <th scope="col"><strong>Date Of Verification</strong></th>
                                        <th scope="col"><strong>Report Severity</strong></th>
                                        <th scope="col"><strong>Report Date</strong></th>
                                        <th scope="col"><strong>Status</strong></th>
                                        <th scope="col"><strong>Case Status</strong></th>
                                        <th scope="col"><strong>Remark</strong></th>                                                                   
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($cases as $case)
                                         <tr>
                                            <td>{{ $case->case_id }}</td>
                                            <td>{{ $case->client_name }}</td>
                                            <td>{{ $case->client_id }}</td>
                                            <td>{{ $case->client_location }}</td>
                                            <td>{{ $case->project_type }}</td>
                                            <td>{{ $case->candiate_name }}</td>
                                            <td>{{ $case->mobile }}</td>
                                            <td>{{ $case->email }}</td>
                                            <td>{{ $case->father_name }}</td>
                                            <td>{{ $case->mother_name }}</td>
                                            <td>{{ $case->allocation_date }}</td>
                                            <td>{{ $case->ageing }}</td>
                                            <td>{{ $case->address_type }}</td>
                                            <td>{{ $case->address }}</td>
                                            <td>{{ $case->city }}</td>
                                            <td>{{ $case->state }}</td>
                                            <td>{{ $case->pincode }}</td>
                                            <td>{{ $case->period_of_stay_from }}</td>
                                            <td>{{ $case->period_of_stay_to }}</td>
                                            <td>{{ $case->date_of_verification }}</td>
                                            <td>{{ $case->report_severity }}</td>
                                            <td>{{ $case->report_date }}</td>
                                            <td>{{ $case->status }}</td>
                                            <td>{{ $case->case_status }}</td>
                                            <td>{{ $case->remark }}</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--</div>-->
@endsection
