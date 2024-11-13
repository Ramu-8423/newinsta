@extends('admin.body.adminmaster')
@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h1>Invoice</h1>
            </div>
            <div class="col-md-6 text-right">
             
            </div>
        </div>
        <style>
        .active-link {
            border-bottom: 2px solid gray;
            padding-bottom: 5px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-link {
            color: #007bff;
        }

        .btn-link:hover {
            color: #0056b3;
        }
        .active-tab {
            text-decoration: underline;
            font-weight: bold;
            font-size:15px;
        }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                         <div class="row text-center">
                            <div class="col">
                                <a href="{{ route('invoice', 1) }}" class="btn btn-link fw-bold-4 {{ request()->route('status') == 1 ? 'active-tab' : '' }}">Send Invoice</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('invoice', 2) }}" class="btn btn-link fw-bold-4 {{ request()->route('status') == 2 ? 'active-tab' : '' }}">Hold Invoice</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('invoice', 3) }}" class="btn btn-link fw-bold-4 {{ request()->route('status') == 3 ? 'active-tab' : '' }}">Reject Invoice</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('invoice', 4) }}" class="btn btn-link fw-bold-4 {{ request()->route('status') == 4 ? 'active-tab' : '' }}">Clear Invoice</a>
                            </div>
                        </div>
                        @if($status ==1)
                        <h4 class="card-title mt-4">Pending Invoice</h4>
                        @elseif($status ==2)
                         <h4 class="card-title mt-4">Hold Invoice</h4>
                         @elseif($status ==3)
                          <h4 class="card-title mt-4">Reject Invoice</h4>
                         @elseif($status ==4)
                         <h4 class="card-title mt-4">Clear Invoice</h4>
                         @endif
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col"><strong>Sr.Num.</strong></th>
                                        <th scope="col"><strong>Invoice Number</strong></th>
                                        <th scope="col"><strong>Company Name</strong></th>
                                        <th scope="col"><strong>File</strong></th>
                                        <th scope="col"><strong>Due Date</strong></th>
                                        <th scope="col"><strong>Create Date</strong></th>
                                        @if($status ==2 || $status ==3 || $status ==4)
                                        <th scope="col"><strong>Receipt file</strong></th>
                                        <th scope="col"><strong>Remark</strong></th>
                                        @endif
                                        <th scope="col"><strong>Status</strong></th>
                                        @if($status ==3)
                                        <th scope="col"><strong>Reason Remark</strong></th>
                                        @endif
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($task as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->invoicenum }}</td>
                                        <td>{{ $data->companyname }}</td>
                                        <!-- Updated this to match the alias from your query -->
                                        <!-- Updated this to match the alias from your query -->
                                        <td>
                                            <a href="{{$data->invoicefile }}" class="btn btn-primary btn-sm"
                                                target="_blank">
                                               <i class="m-r-10 mdi mdi-eye h5 ml-2"></i>
                                            </a>
                                            <a href="{{ route('download.file', ['file' => $data->invoicefile]) }}" class="btn btn-success btn-sm">
                                                <i class="m-r-10 mdi mdi-download h5 ml-2"></i>
                                            </a>
                                        </td>
                                        <td>{{ $data->deuedate }}</td>
                                        <td>{{ $data->updated_at }}</td>
                                         @if($status ==2 || $status ==3 || $status ==4)
                                         <td>
                                              <a href="{{$data->spendingfile }}" class="btn btn-primary btn-sm"
                                                target="_blank">
                                               <i class="m-r-10 mdi mdi-eye h5 ml-2"></i>
                                            </a>
                                              <a href="{{ route('download.file', ['file' => $data->spendingfile]) }}" class="btn btn-success btn-sm">
                                                <i class="m-r-10 mdi mdi-download h5 ml-2"></i>
                                            </a>
                                         </td>
                                         <td>{{$data->remark}}</td>
                                        @endif
                                        <td>
                                           @if($status ==1)
                                            <a href="#" class="btn btn-warning btn-sm open-modal" data-toggle="modal"
                                                data-target="#imageModal" data-invoicenum="{{ $data->invoicenum }}"
                                                data-deuedate="{{ $data->deuedate }}" data-id="{{ $data->id }}"
                                                data-companyname="{{ $data->companyname }}">
                                                Pending
                                            </a>
                                            @elseif($status ==2)
                                              <a href="#" class="btn btn-primary btn-sm open-modal">weating for aaprovle</a>
                                            @elseif($status ==3)
                                             <a href="#" class="btn btn-danger btn-sm open-modal">Reject</a>
                                            @elseif($status ==4)
                                             <a href="#" class="btn btn-success btn-sm open-modal">Clear</a>
                                            @endif
                                        </td>
                                        @if($status ==3)
                                         <td>{{$data->reasonremark}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--modal for invoice insert-->
                            <!-- Modal for invoice insert -->
                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered"
                                    style="max-width: 750px; width: 100%; margin: auto;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close ml-auto btn-sm" data-dismiss="modal"
                                                aria-label="Close"
                                                style="background-color: #5e60a9; color: white; padding: 6px 12px; border-radius: 5px; cursor: pointer;">
                                                Close
                                            </button>
                                        </div>
                                        <div class="card">
                                            <form action="{{ route('update.spendings') }}" class="form-horizontal"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h4 class="card-title" style="color: #5e60a9;">Clear Invoice
                                                            Information</h4>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="invoicenum"
                                                            class="col-sm-2 control-label col-form-label">Invoice
                                                            Number</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="invoicenum" class="form-control"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="deuedate"
                                                            class="col-sm-2 control-label col-form-label">Due
                                                            Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="deuedate" class="form-control"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="companyname"
                                                            class="col-sm-2 control-label col-form-label">Company
                                                            Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="companyname" class="form-control"
                                                                disabled>
                                                            <input type="hidden" name="id" id="modal-id" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname"
                                                            class="col-sm-2 control-label col-form-label">Receipt file</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" name="spendingfile" class="form-control"
                                                                required id="lname" placeholder="Client Upload File"
                                                                accept=".pdf, .jpg, .jpeg, .png"
                                                                onchange="if(this.files[0] && !['application/pdf', 'image/jpeg', 'image/png'].includes(this.files[0].type)){ alert('Only PDF, JPG, and PNG files are allowed.'); this.value = ''; }">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="cono1"
                                                            class="col-sm-2 control-label col-form-label">Remark
                                                            (Optional)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="remark" class="form-control"
                                                                placeholder="remark Optional" required>
                                                        </div>
                                                    </div>

                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <button type="submit" class="btn btn-primary"
                                                                style="background-color: #5e60a9; color: white;">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for invoice insert end -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 CSS and JS links (if not added in master template) -->
<link rel="stylesheet" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>

<script>
$(document).ready(function() {
    $('#imageModal').on('shown.bs.modal', function() {
        $('#client_address').select2({
            placeholder: "Select an option",
            allowClear: true,
            dropdownParent: $('#imageModal'), // Ensures dropdown renders within the modal
            width: '100%' // Matches the dropdown width
        });
    });
});
</script>
<script>
$(document).on('click', '.open-modal', function() {
    var invoicenum = $(this).data('invoicenum');
    var deuedate = $(this).data('deuedate');
    var companyname = $(this).data('companyname');
    var id = $(this).data('id'); // Get the ID

    // Set the values in the modal
    $('#invoicenum').val(invoicenum);
    $('#deuedate').val(deuedate);
    $('#companyname').val(companyname);
    $('#modal-id').val(id); // Set the hidden input with the ID
});
</script>
@endsection