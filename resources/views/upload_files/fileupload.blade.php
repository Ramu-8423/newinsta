@extends('admin.body.adminmaster')

@section('admin')
    <div class="container">
        
        <br>
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <div class="row justify-content-center align-items-center" style="height: 80vh; margin-top: -5vh;">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Upload a File</h2>
                    <form action="https://instaclient.yashkirti.com/allocation_preview.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group mt-3">
                            <input type="hidden" name="client_id" value="{{session('client_login_id')}}">
                            <label for="projectSelect">Select Project</label>
                            <select name="project" id="projectSelect" class="form-control"required>
                                <option value="">Select a project</option>
                                <option value="1">Address Verification</option>
                                <option value="2">Site Visit</option>
                            </select>
                        </div>

                              {{--
                        <div class="form-group mt-3">
                            <label for="locationSelect">Select Location</label>
                            <select name="location" id="locationSelect" class="form-control" required>
                                <option value="">Select a location</option>
                                <option value="location_1">Location 1</option>
                                <option value="location_2">Location 2</option>
                            </select>
                        </div>
                             --}}
                    
                        <div class="form-group mt-3">
                            <label for="fileInput">Choose a file</label>
                            <input type="file" id="fileInput" name="excel_file" accept=".xls,.csv,.xlsx" class="form-control" required>
                        </div>
                        
                        <button name="submit" type="submit" class="btn btn-primary btn-block mt-4">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
