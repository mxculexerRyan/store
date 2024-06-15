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
                            <h6 class="card-title">Expenses List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Expense 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Receipt</th>
                                <th>Expense Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>From</th>
                                <th>Account</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($expensesData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @if ($item->expense_receipt != "")
                                    <td><figure class="mb-2"><img class="rounded img-fluid" src="{{ url('uploads/receipts/'.$item->expense_receipt)}}" alt="receipt"></figure></td>
                                @else
                                    <td><figure class="mb-2"><img class="rounded img-fluid" src="{{ url('/images/30x30.PNG') }}" alt="receipt"></figure></td>
                                @endif
                                @php
                                    $accountId = $item->account; $accountDetails = App\Models\Accounting\Account::find($accountId);
                                    $payer_id = $item->paid_by; $userDetails = App\Models\User::find($payer_id);
                                @endphp
                                <td>{{ $item->expense_name }}</td>
                                <td>{{ $item->expense_amount }}</td>
                                <td>{{ $item->expense_description }}</td>
                                <td>{{ $userDetails->name }}</td>
                                <td>{{ $accountDetails->account_name }} - {{ $accountDetails->account_type }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editExpenseModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.expensemodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 