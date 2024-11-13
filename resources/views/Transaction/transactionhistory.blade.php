<!--{{-- resources/views/user/userlist.blade.php --}}-->

@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        <h1>History</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('transactionhistory',0) }}" class="btn btn-info" style="margin-bottom: 20px;"></a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction history</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Client ID</strong></th>
                                        <th scope="col"><strong>Amount</strong></th>
                                        <th scope="col"><strong>Status</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($cases as $case)
                                         <tr>
                                            <td>{{ $case->client_id }}</td>
                                            <td>{{ $case->amount }}</td>
                                            <td>{{ $case->status }}</td>
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
