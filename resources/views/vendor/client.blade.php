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
        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="full graph_head">
            					<div class="row justify-content-between" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">
            						<form id="filterForm" class="col-auto" method="post" action=" {{route('newallocation',$status_id)}}">
            						    
            							@csrf
            							<div class="row align-items-center">
            								<div class="col-auto">
            									<h4 style="color: #333;">Filter Record - </h4>
            								</div>
            								
            								<div class="col-auto">
            							<input type="text"  step="any" class="form-control" id="candidate_name" name="candidate_name" style="background-color: #fff; color: #333;" placeholder="Enter Candidate Name">
            								</div>
            								
            								<div class="col-auto">
            									<input type="varchar"  class="form-control" id="email_id" name="email_id" style="background-color: #fff; color: #333;" placeholder="Enter Email ID">
            								</div>
            								
            								<div class="col-auto">
            									<input type="number"  step="any" class="form-control" id="mobile" name="mobile" style="background-color: #fff; color: #333;" placeholder="Enter Mobile Number">
            								</div>
            
            								<div class="col-auto">
            									<button type="submit" name="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;">Submit</button>
            								</div>
            							</div>
            						</form>
            						<div class="col-auto">
            						<form method="post" action="{{ route('reset_filters_approved_case')}}">
            								@csrf
            								<button type="submit" name="submit" class="btn btn-secondary">Reset Filters</button>
            							</form>
            						</div>
            					</div>
            
            				</div>
                        <h4 class="card-title"></h4>
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
                                        <th scope="col"><strong>Approved Status</strong></th>
                                        <th scope="col"><strong>View</strong></th>
                                        <th scope="col"><strong>Action</strong></th>
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
                                            <td>{{ $case->candidate_name }}</td>
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
                                            <td>{{ $case->approved_status}}</td>
                                            <td><button>View</button></td>
                                            <td><button>Action</button></td>
                                            <td>{{ $case->remark }}</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                            
                            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->url(1) }}" aria-label="First">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
            
                    @php
                        $half_total_links = floor(9 / 2);
                        $from = $cases->currentPage() - $half_total_links;
                        $to = $cases->currentPage() + $half_total_links;
            
                        if ($cases->currentPage() < $half_total_links) {
                            $to += $half_total_links - $cases->currentPage();
                        }
            
                        if ($cases->lastPage() - $cases->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($cases->lastPage() - $cases->currentPage()) - 1;
                        }
                    @endphp
            
                    @for ($i = $from; $i <= $to; $i++)
                        @if ($i > 0 && $i <= $cases->lastPage())
                            <li class="page-item {{ $cases->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $cases->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
            
                    <li class="page-item {{ $cases->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $cases->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <li class="page-item {{ $cases->currentPage() == $cases->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cases->url($cases->lastPage()) }}" aria-label="Last">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    </div>
</div>
<!--</div>-->
@endsection
