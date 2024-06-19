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
                                <h6 class="card-title">Creditors List</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addCreditModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Credits 
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    {{-- <th>No.</th> --}}
                                    <th>Creditor's Name</th>
                                    <th>Credited Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Creditors Phone</th>
                                    <th>Reason</th>
                                    <th>Due date</th>
                                    <th>Balance</th>
                                    <th>Pay</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($creditsData as $key => $item)
                                <tr>
                                    {{-- <td>{{ $key+1 }}</td> --}}
                                    @php
                                        $user_type = $item->user_type;
                                        $creditors_id = $item->creditors_name;
                                        if ($user_type == "shareholders") {
                                            $creditorsdata = App\Models\Hr\Shareholder::find($creditors_id);
                                            $creditorsname = $creditorsdata->name;
                                            $creditorsphone = $creditorsdata->phone;
                                        }else {
                                            $creditorsdata = App\Models\User::find($creditors_id);
                                            $creditorsname = $creditorsdata->name;
                                            $creditorsphone = $creditorsdata->phone;
                                        }
                                    @endphp
                                    <td>{{ $creditorsname }}</td>
                                    <td>{{ number_format($item->credited_amount) }}</td>
                                    <td>{{ number_format($item->paid_amount) }}</td>
                                    <td>{{ $creditorsphone }}</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    @php
                                        $credited_amount = $item->credited_amount;
                                        $paid_amount = $item->paid_amount;
                                        if($credited_amount > $paid_amount){
                                            $balance = $credited_amount - $paid_amount;
                                        }else{
                                            $balance = $paid_amount - $credited_amount;
                                        }
                                    @endphp
                                    <td><span class="border badge border-danger text-danger">{{ $balance }}</span></td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-primary btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editCreditModal" data-id="{{ $item->id }}"><i data-feather="credit-card"></i></button></td>
                                </tr>
                                @endforeach
                                {{-- @foreach ($creditSales as $key => $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->order_value) }}</td>
                                    <td> {{ number_format($item->paid_amount) }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>Purchase of order No: {{ $item->id }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td><span class="border badge border-danger text-danger">{{ ($item->order_value) - ($item->paid_amount)}}</span></td>
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editCreditModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                        <x-loans.creditmodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script>
    $(function(){
        $("#creditors_name").select2({
            dropdownParent: $("#addCreditModalLabel")
        });
    });
    $(function(){
        $("#account").select2({
            dropdownParent: $("#addCreditModalLabel")
        });
    });
</script>
<script src="{{ asset('/frontend/assets/js/loans/credits.js') }}"></script>
</body>
</html> 