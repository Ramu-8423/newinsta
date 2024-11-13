@extends('admin.body.adminmaster')


@section('admin')   



<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fa fa-globe m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">8540</h5>
                        <h6 class="text-white">All Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="fa fa-user m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">2540</h5>
                        <h6 class="text-white">Pending Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="fa fa-plus m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">120</h5>
                        <h6 class="text-white">Insuff Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                  
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="fa fa-cart-plus m-b-5 font-16"></i></h1>
                        <h5 class="text-white m-b-0 m-t-5">656</h5>
                        <h6 class="text-white">Hold Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="fa fa-tag m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">100</h5>
                        <h6 class="text-white">Rejected Cases</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                   
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fa fa-table m-b-5 font-16"></i></h1>
                        <h5 class=" text-white m-b-0 m-t-5">100</h5>
                        <h6 class="text-white">Reopen Cases</h6>
                    </div>
                </div>
            </div>
        </div>
        
        

<style>
    .active-link {
        border-bottom: 2px solid gray; /* Color of the underline */
        padding-bottom: 5px; /* Space between text and line */
        color: #007bff; /* Color of the active text */
        font-weight: bold; /* Optional: to ensure the text remains bold */
    }
    .btn-link {
        color: #007bff; /* Default color for the links */
    }
    .btn-link:hover {
        color: #0056b3; /* Color on hover */
    }
</style>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col">
                        <a href="{{ route('dashboard',0) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 0 ? 'active-link' : '' }}">All Cases</a>
                        <a href="{{ route('dashboard',1) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 1 ? 'active-link' : '' }}">Pending Cases</a>
                        <a href="{{ route('dashboard',2) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 2 ? 'active-link' : '' }}">Insuff Cases</a>
                        <a href="{{ route('dashboard',3) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 3 ? 'active-link' : '' }}">Hold Cases</a>
                        <a href="{{ route('dashboard',4) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 4 ? 'active-link' : '' }}">Rejected Cases</a>
                        <a href="{{ route('dashboard',5) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 5 ? 'active-link' : '' }}">Reopen Cases</a>
                        <a href="{{ route('dashboard',8) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 8 ? 'active-link' : '' }}">Completed</a>
                        <a href="{{ route('dashboard',14) }}" class="btn btn-link fw-bold fs-4 {{ $status_id == 14 ? 'active-link' : '' }}">Closed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







        
        
        <!-- ============================================================== -->
        <!-- New Container for Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="full graph_head">
            					<div class="row justify-content-between" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">
            						<form id="filterForm" class="col-auto" method="post" action=" {{route('dashboard',$status_id)}}">
            						    
            							@csrf
            							<div class="row align-items-center">
            								<div class="col-auto">
            									<h4 style="color: #333;">Filter Record - </h4>
            								</div>
            				
            				
            					           <div class="col-auto">
            				<input type="hidden"  class="form-control" id="candidate_name" name="status_id" style="background-color: #fff; color: #333;" value="{{$status_id}}">
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
            						<form method="post" action="{{ route('reset_filters_users')}}">
            								@csrf
            								<button type="submit" name="submit" class="btn btn-secondary">Reset Filters</button>
            							</form>
            						</div>
            					</div>
            
            				</div>
                        <div class="table-responsive">
                          <table class="table table-hover" style="white-space: nowrap;">
                              <thead>
                                 <tr>
                                    <th scope="col"><strong>Case ID</strong></th>
                                     @if($status_id==8)
                                    <th>Action</th>
                                    @endif
                                    <th scope="col"><strong>Employee ID</strong></th>
                                    <th scope="col"><strong>Location</strong></th>
                                    <th scope="col"><strong>Project Type</strong></th>
                                    <th scope="col"><strong>Pincode</strong></th>
                                     <th scope="col"><strong>Case Status</strong></th>
                                    <th scope="col"><strong>Candidate Name</strong></th>
                                    <th scope="col"><strong>Mobile</strong></th>
                                    <th scope="col"><strong>Email</strong></th>
                                    <th scope="col"><strong>Father Name</strong></th>
                                    <th scope="col"><strong>Mother Name</strong></th>
                                    <th scope="col"><strong>Address Type</strong></th>
                                    <th scope="col"><strong>Address</strong></th>
                                    <th scope="col"><strong>City</strong></th>
                                    <th scope="col"><strong>State</strong></th>
                                    <th scope="col"><strong>Period Of Stay From</strong></th>
                                    <th scope="col"><strong>Period Of Stay To</strong></th>
                                    <th scope="col"><strong>Contact Person Name</strong></th>
                                    <th scope="col"><strong>Person Designation</strong></th>
                                    <th scope="col"><strong>Site Vendor Name</strong></th>
                                    <th scope="col"><strong>GST Number</strong></th>
                                    <th scope="col"><strong>PAN Card Number</strong></th>
                                    <th scope="col"><strong>Allocated Date</strong></th>
                                 
                                    <th scope="col"><strong>Case Closer Date</strong></th>
                                    <th scope="col"><strong>Case Completed Date</strong></th>
                                    <th scope="col"><strong>End Date</strong></th>
                                </tr>
                             </thead>
                          <tbody>
                            @foreach($cases as $case)
                            <tr>
                                <td>{{ $case->case_id }}</td>
                                 @if($status_id==8)
                                <td><button type="btn" class="btn btn-primary btn-sm">Action</button></td>
                                @endif
                                <td>{{ $case->employee_id??'N/A'; }}</td>
                                <td>{{ $case->location??'N/A'; }}</td>
                                <td>{{ $case->project_type ==1?'Address Verification':'Site Investigation'}}</td>
                                <td>{{ $case->pincode??'N/A'; }}</td>
                                <td>
                             @if($case->approved_status == 0 || $case->approved_status == 2)
                                     {{ 'Pending' }}
                             @elseif($case->case_status==1)
                                    {{ 'Allocated' }}
                             @elseif($case->case_status==2)
                                    {{ 'Insuff' }}
                             @elseif($case->case_status==3)
                                    {{ 'Hold' }}
                             @elseif($case->case_status==4)
                                    {{ 'Rejected' }}
                             @elseif($case->case_status==5)
                                    {{ 'Re-Open' }}
                             @elseif($case->case_status==6)
                                    {{ 'Overdue' }}
                             @elseif($case->case_status==7)
                                    {{ 'In Review' }}
                             @elseif($case->case_status==8)
                                    {{ 'Completed' }}
                             @elseif($case->case_status==9)
                                    {{ 'Accepted' }}
                             @elseif($case->case_status==11)
                                    {{ 'Runner State' }}
                             @elseif($case->case_status==12)
                                    {{ 'On the way' }}
                             @elseif($case->case_status==13)
                                    {{ 'Rport Submitted by Vendor' }}
                             @elseif($case->case_status==14)
                                    {{ 'Closed' }}
                             @endif
                                
                                </td>
                                <td>{{ $case->candidate_name??'N/A'}}</td>
                                <td>{{ $case->mobile??'N/A'}}</td>
                                <td>{{ $case->email??'N/A'}}</td>
                                <td>{{ $case->father_name??'N/A'}}</td>
                                <td>{{ $case->mother_name??'N/A'}}</td>
                                <td>{{ $case->address_type??'N/A'}}</td>
                                <td>{{ $case->address??'N/A'}}</td>
                                <td>{{ $case->city??'N/A'}}</td>
                                <td>{{ $case->state??'N/A'}}</td>
                                <td>{{ $case->period_of_stay_from??'N/A'}}</td>
                                <td>{{ $case->period_of_stay_to??'N/A'}}</td>
                                <td>{{ $case->contact_person_name??'N/A'}}</td>
                                <td>{{ $case->contact_person_desi??'N/A'}}</td>
                                <td>{{ $case->site_vendor_name??'N/A'}}</td>
                                <td>{{ $case->gst_number??'N/A'}}</td>
                                <td>{{ $case->pan_card_num??'N/A'}}</td>
                                <td>{{ $case->created_at??'N/A'}}</td>
                                
                                <td>{{ $case->case_closer_date??'N/A'}}</td>
                                <td>{{ $case->case_completed_date??'N/A'}}</td>
                                <td>{{ $case->end_date??'N/A'}}</td>
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
   
    
    <!-- footer -->

    <!-- <footer class="footer text-center">-->
    <!--    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.-->
    <!--</footer> -->
    
</div>
</div>


@endsection
