@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        <h1>Transactions History</h1>

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

                        <!-- Flexbox for Balance and Recharge Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Current Balance: {{$wallet}} ₹ </h3>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#rechargeModal">Recharge Your Account</button>
                        </div>

                        <!-- Modal for Recharge -->
                        <div class="modal fade" id="rechargeModal" tabindex="-1" role="dialog" aria-labelledby="rechargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rechargeModalLabel">Recharge Your Account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('recharge.account') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="amount">Enter Amount:</label>
                                                <input type="number" class="form-control" name="amount" required>
                                            </div>
                                            <button type="submit" class="button-91 small-button">Recharge</button>
                                        </form>
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
                        <!--<div class="d-flex align-items-center custom-button-group">-->
                            <!--<h4 class="card-title">Recharge History:</h4>-->
                        <!--    <a href="#" class="button-91 small-button mb-2 mr-2 active">All</a>-->
                        <!--    <a href="#" class="button-91 small-button mb-2 mr-2">Credit</a>-->
                        <!--    <a href="#" class="button-91 small-button mb-2">Debit</a>-->
                        <!--</div>-->

                        <div class="table-responsive">
                            <table class="table table-hover" style="white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th scope="col"><strong>Serial Number</strong></th>
                                        <th scope="col"><strong>Amount</strong></th>
                                        <th scope="col"><strong>Type</strong></th>
                                        <th scope="col"><strong>Status</strong></th>
                                        <th scope="col"><strong>Date</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trs_history as $transaction)
                                    <tr>
                                        <td scope="col"><strong>{{ $trs_history->total() - (($trs_history->currentPage() - 1) * $trs_history->perPage() + $loop->iteration - 1) }}</strong></td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->type==1?'Credited':'Debited'}}</td>
                                        <td>{{$transaction->status==0?'Pending':($transaction->status==1?'Success':'Failed')}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $trs_history->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $trs_history->appends(request()->query())->url(1) }}" aria-label="First">
                                            <span aria-hidden="true">&laquo;&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $trs_history->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $trs_history->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                            
                                    @php
                                        $half_total_links = floor(9 / 2);
                                        $from = $trs_history->currentPage() - $half_total_links;
                                        $to = $trs_history->currentPage() + $half_total_links;
                            
                                        if ($trs_history->currentPage() < $half_total_links) {
                                            $to += $half_total_links - $trs_history->currentPage();
                                        }
                            
                                        if ($trs_history->lastPage() - $trs_history->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($trs_history->lastPage() - $trs_history->currentPage()) - 1;
                                        }
                                    @endphp
                            
                                    @for ($i = $from; $i <= $to; $i++)
                                        @if ($i > 0 && $i <= $trs_history->lastPage())
                                            <li class="page-item {{ $trs_history->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $trs_history->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                            
                                    <li class="page-item {{ $trs_history->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $trs_history->appends(request()->query())->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $trs_history->currentPage() == $trs_history->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $trs_history->appends(request()->query())->url($trs_history->lastPage()) }}" aria-label="Last">
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

@endsection
