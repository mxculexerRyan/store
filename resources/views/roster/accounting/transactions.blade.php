<x-pagetop/>
<div class="page-content">

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                @foreach ($accountsData as $key => $item)
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="mb-0 card-title">{{ $item->account_type }} Balance</h6>
                                    <div class="mb-2 dropdown">
                                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3 d-flex justify-content-between align-items-baseline">
                                        <h2>{{ number_format($item->account_balance) }}</h2>
                                        <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="mb-1 icon-sm"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tags List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Transactions 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Account</th>
                                <th>Direction</th>
                                <th>Amount</th>
                                <th>Direction</th>
                                <th>Name</th>
                                <th>Reason</th>
                                <th>Account Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transactionData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$item->account_name }} - {{$item->account_type }}</td>
                                <td>
                                    @php 
                                        if($item->nature == "Cash-out"){
                                            $direction = 'Sent';
                                            $directions = 'to';
                                            $toId = $item->to;
                                            $creditorsdata = App\Models\Hr\Shareholder::find($toId);
                                            $creditorsname = $creditorsdata->name;
                                        }else if($item->nature == "Spent"){
                                            $direction = 'Spent';
                                            $directions = 'on';
                                            $creditorsname = $item->reason;
                                        }else if($item->nature == "Transfered"){
                                            $direction = 'Received';
                                            $directions = 'from';
                                            $fromId = $item->from;
                                            $accountsdata = App\Models\Accounting\Account::find($fromId);
                                            $creditorsname = $accountsdata->account_type;
                                        }else{
                                            $direction = 'Received';
                                            $directions = 'from';
                                            $fromId = $item->from;
                                            $creditorsdata = App\Models\Hr\Shareholder::find($fromId);
                                            $creditorsname = $creditorsdata->name;
                                        }
                                    @endphp
                                    <span class="border badge border-success text-success">{{ $direction }}</span>
                                    </td>
                                <td>{{ $item->amount }}</td>
                                <td><span class="border badge border-primary text-primary">{{ $directions }}</span></td>
                                <td>{{ $creditorsname }}</td>
                                <td>{{ $item->reason }}</td>
                                <td>{{ $item->balance }}</td>
                                {{-- <td>@if ($item->tag_status == "available")
                                    <span class="border badge border-success text-success">{{ $item->tag_status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->tag_status }}</span>
                                @endif</td> --}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.transactionmodal/>
                </div>
            </div>
        </div>
    </div>

</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/transactions.js') }}"></script>
</body>
</html> 