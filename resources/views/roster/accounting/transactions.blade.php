<x-pagetop/>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Table</li>
        </ol>
    </nav>

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
                                {{-- <th>From</th> --}}
                                <th>Direction</th>
                                <th>Name</th>
                                <th>Account Balance</th>
                                <th>Edit</th>
                                <th>Delete</th>
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
                                <td>{{ $item->balance }}</td>
                                {{-- <td>@if ($item->tag_status == "available")
                                    <span class="border badge border-success text-success">{{ $item->tag_status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->tag_status }}</span>
                                @endif</td> --}}
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editTransactionModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
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