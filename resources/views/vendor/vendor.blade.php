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
               <div class="row text-center">
                <div class="col-auto">
                    <select name="project" id="projectSelect" class="form-control outline-primary mb-2 custom-dropdown">
                        <option value="">Select Project Type</option>
                        <option value="1" {{ $selected_project == '1' ? 'selected' : '' }}>Address Verification</option>
                        <option value="2" {{ $selected_project == '2' ? 'selected' : '' }}>Site Visit</option>
                    </select>
                </div>


                <div class="col">
                    <a href="{{ route('newallocation', ['status_id' => 101, 'project' => $selected_project]) }}" 
                       class="{{ $status_id == 101 ? 'button-92' : 'button-91' }} small-button" 
                       style="margin-bottom: 20px; display: inline-block;">
                       ALL Cases
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('newallocation', ['status_id' => 0, 'project' => $selected_project]) }}" 
                       class="{{ $status_id == 0 ? 'button-92' : 'button-91' }} small-button" 
                       style="margin-bottom: 20px; display: inline-block;">
                       Pending
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('newallocation', ['status_id' => 1, 'project' => $selected_project]) }}" 
                       class="{{ $status_id == 1 ? 'button-92' : 'button-91' }} small-button" 
                       style="margin-bottom: 20px; display: inline-block;">
                       Approved
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('newallocation', ['status_id' => 2, 'project' => $selected_project]) }}" 
                       class="{{ $status_id == 2 ? 'button-92' : 'button-91' }} small-button" 
                       style="margin-bottom: 20px; display: inline-block;">
                       Rejected
                    </a>
                </div>



                <script>
                    document.getElementById('projectSelect').addEventListener('change', function() {
                        var selectedProject = this.value;
                        var statusId = '{{ $status_id }}'; // Get the current status ID
                        window.location.href = '{{ url("/newallocation") }}/' + statusId + '/' + selectedProject;
                    });
                </script>
                    <div class="col-auto">
                        <!-- Modal for File Upload -->
                        <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="fileUploadModalLabel">Upload File</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="https://instaclient.yashkirti.com/allocation_preview.php" method="POST" enctype="multipart/form-data">
                                            @csrf
                    
                                            <input type="hidden" name="client_id" value="{{ session('client_login_id') }}">
                                            
                                            <div class="form-group mt-3" style="text-align: left;">
                                                <label for="projectSelect" style="display: block;">Select Project</label>
                                                <select name="project" id="projectSelect" class="form-control" required>
                                                    <option value="">Select a project</option>
                                                    <option value="1">Address Verification</option>
                                                    <option value="2">Site Visit</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group mt-3" style="text-align: left;">
                                                <label for="fileInput" style="display: block;">Choose file to upload</label>
                                                <input type="file" id="fileInput" name="excel_file" accept=".xls,.csv,.xlsx" class="form-control" required>
                                            </div>

                                        
                                            <button type="submit" name="submit" class="button-91 small-button" style="background-color: #28a745; border-color: #28a745; color: white;">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="button-91 small-button mb-2" style="background-color: #28a745; border-color: #28a745; color: white;" data-toggle="modal" data-target="#fileUploadModal">Upload</button>
                    </div>

                    <div class="col-auto">
                        <div class="btn-group">
                            <button type="button" class="button-91 small-button dropdown-toggle mb-2" style="background-color: #28a745; border-color: #28a745;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download Upload Template
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('excel_template/site.xlsx') }}">Site Visit</a>
                                <a class="dropdown-item" href="{{ url('excel_template/address.xlsx') }}">Address Verification</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="full graph_head">
            					<div class="row justify-content-between" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">
            						<form id="filterForm" class="col-auto" method="post" action=" {{route('newallocation',['status_id'=>$status_id,'project'=>$selected_project])}}">
            						    
            							@csrf
            							<div class="row align-items-center">
            								<div class="col-auto">
            									<h4 style="color: #333;">Filter Record - </h4>
            								</div>
            							<div class ="col-auto">
            							<input type="text" class="form-control" id="candidate_name" name="candidate_name" value="{{ session('candidate_name') }}" style="background-color: #fff; color: #333;" placeholder="Candidate Name">
            							</div>
                                        <div class="col-auto">
                                        <input type="text" class="form-control" id="email_id" name="email_id" value="{{ session('email_id') }}" style="background-color: #fff; color: #333;" placeholder="Enter Email ID">
                                        </div>
                                        <div class ="col-auto">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ session('mobile') }}" style="background-color: #fff; color: #333;" placeholder="Mobile">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-secondary">Apply Filters</button>
                                        </form>
                                        
                                        <!-- Reset Filters Button -->
                                        <a href="{{ route('resetFilters') }}" style="margin-left: 20px;>
                                            <button type="button" name="submit" class="btn btn-secondary">Reset Filters</button>
                                        </a>
            						</form> 
            						
                                    <script>
                                        document.getElementById('projectSelect').addEventListener('change', function() {
                                            var form = document.getElementById('filterForm');
                                            var selectedProject = this.value;
                                            var statusId = '{{ $status_id }}'; // Get the current status ID
                                            // Update the form action with the selected project type and status_id
                                            form.action = '{{ url("/newallocation") }}/' + statusId + '?project=' + selectedProject;
                                            // Submit the form automatically
                                            form.submit();
                                        });
                                    </script>

            					</div>
            				</div>
                        <h4 class="card-title">Client and Vendor Details</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                
                                <thead>
                                    <tr>
                                        @if($selected_project == 1)
                                        <th scope="col"><strong>Case ID</strong></th>
                                        <th scope="col"><strong>Project Type</strong></th>
                            
                                        @if($selected_project == 1)
                                        <th scope="col"><strong>Candidate Name</strong></th>
                                        <th scope="col"><strong>Father Name</strong></th>
                                        <th scope="col"><strong>Mother Name</strong></th>
                                        @endif
                                        <th scope="col"><strong>Created At</strong></th>
                                        @endif
                                        <th scope="col"><strong>Employee ID</strong></th>
                                        <th scope="col"><strong>Client Location</strong></th>
                                        <th scope="col"><strong>Mobile</strong></th>
                                        <th scope="col"><strong>Email</strong></th>
                                        <th scope="col"><strong>Address type</strong></th>
                                        <th scope="col"><strong>Address</strong></th>
                                        <th scope="col"><strong>City</strong></th>
                                        <th scope="col"><strong>State</strong></th>
                                        <th scope="col"><strong>Pincode</strong></th>
                                        <th scope="col"><strong>Peroid Of Stay From</strong></th>
                                        <th scope="col"><strong>Peroid Of Stay TO</strong></th>
                                        @if($selected_project == 2)
                                        <th scope="col"><strong>Contact Person Name</strong></th>
                                        <th scope="col"><strong>Contact Person Designation</strong></th>
                                        <th scope="col"><strong>Site Vendor name</strong></th>
                                        <th scope="col"><strong>GST Number</strong></th>
                                        <th scope="col"><strong>Pan Card Number</strong></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cases as $case)
                                    <tr>
                                        @if($selected_project == 1)
                                        <td>{{ $case->case_id }}</td>
                                        <td>{{ $projectTypes[$case->project_type] ?? 'Unknown' }}</td>
                            
                                        @if($selected_project == 1)
                                        <td>{{ $case->candidate_name }}</td>
                                        <td>{{ $case->father_name }}</td>
                                        <td>{{ $case->mother_name }}</td>
                                        @endif
                            
                                        <td>{{ $case->created_at }}</td>
                                        @endif
                            
                                        <td>{{ $case->employee_id }}</td>
                                        <td>{{ $case->location }}</td>
                                        <td>{{ $case->mobile }}</td>
                                        <td>{{ $case->email }}</td>
                                        <td>{{ $case->address_type }}</td>
                                        <td>{{ $case->address }}</td>
                                        <td>{{ $case->city }}</td>
                                        <td>{{ $case->state }}</td>
                                        <td>{{ $case->pincode }}</td>
                                        <td>{{ $case->period_of_stay_from }}</td>
                                        <td>{{ $case->period_of_stay_to }}</td>
                                        @if($selected_project == 2)
                                        <td>{{ $case->contact_person_name }}</td>
                                        <td>{{ $case->contact_person_desi }}</td>
                                        <td>{{ $case->site_vendor_name }}</td>
                                        <td>{{ $case->gst_number }}</td>
                                        <td>{{ $case->pan_card_num }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $cases->appends(request()->query())->url(1) }}" aria-label="First">
                                            <span aria-hidden="true">&laquo;&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $cases->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $cases->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">
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
                                                <a class="page-link" href="{{ $cases->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                            
                                    <li class="page-item {{ $cases->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $cases->appends(request()->query())->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $cases->currentPage() == $cases->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $cases->appends(request()->query())->url($cases->lastPage()) }}" aria-label="Last">
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
<!--</div>-->
@endsection
