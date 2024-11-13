@extends('admin.body.adminmaster')
@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
       
    <div class="d-flex">
          <div class="mr-auto p-2"> <h2>Upload Cases</h2></div>
    </div>
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
               <div class="row text-center d-flex justify-content-end" >
                  
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
                                        <form action="{{env('APP_URL')}}allocation_preview.php" method="POST" enctype="multipart/form-data">
                                            @csrf
                    
                                            <input type="hidden" name="client_id" value="{{ session('client_login_id') }}">
                                            <input type="hidden" name="login_client_pay_type" value="{{ session('login_client_pay_type') }}">
                                            
                                            <div class="form-group mt-3" style="text-align: left;">
                                                <label for="projectSelect" style="display: block;">Select Project</label>
                                                <select name="project" id="projectSelect" class="form-control" required>
                                                    <option value="">Select a project</option>
                                                    <option value="1">Address Verification</option>
                                                    <option value="2">Site Investigation</option>
                                                    <option value="3">Digital Address Verification</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group mt-3" style="text-align: left;">
                                                <label for="fileInput" style="display: block;">Choose file to upload</label>
                                                <input type="file" id="fileInput" name="excel_file" accept=".xls,.csv,.xlsx" class="form-control" required>
                                            </div>

                                        
                                            <button type="submit" name="submit" class="btn btn-primary" >Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#fileUploadModal">Upload</button>
                    </div>

                    <div class="col-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <h4 class="card-title">Uploaded Case Count</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Project Type</strong></th>
                                        <th scope="col"><strong>Case Count</strong></th>
                                        <th scope="col"><strong>Date</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cases as $case)
                                    <tr>
                                       <td scope="col"><strong>{{ $cases->total() - (($cases->currentPage() - 1) * $cases->perPage() + $loop->iteration - 1) }}</strong></td>
                                        <td scope="col"><strong>{{$case->project_type==1?'Address Verification':($case->project_type==2?'Site Investigation':'Digital Address Verification')}}</strong></td>
                                        <td scope="col"><strong>{{$case->case_count}}</strong></td>
                                        <td scope="col"><strong>{{$case->created_at}}</strong></td>
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
