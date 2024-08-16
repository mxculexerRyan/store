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
                                <h6 class="card-title">Debtors List</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addDebtModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Debts 
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Debtor's Name</th>
                                    <th>Debited Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Debtor's Phone</th>
                                    <th>Reason</th>
                                    <th>Due date</th>
                                    <th>Balance</th>
                                    <th>Paid</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($debtsData as $key => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    @php
                                        $user_type = $item->user_type;
                                        $debtors_id = $item->debtors_name;
                                        if ($user_type == "shareholders") {
                                            $debtorsdata = App\Models\Hr\Shareholder::find($debtors_id);
                                            $debtors_name = $debtorsdata->name;
                                            $debtorsphone = $debtorsdata->phone;
                                        }else {
                                            $debtorsdata = App\Models\User::find($debtors_id);
                                            $debtors_name = $debtorsdata->name;
                                            $debtorsphone = $debtorsdata->phone;
                                        }
                                    @endphp
                                    <td>{{ $debtors_name }}</td>
                                    <td>{{ number_format($item->debited_amount) }}</td>
                                    <td>{{ number_format($item->paid_amount) }}</td>
                                    <td>{{ $debtorsphone }}</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    @php
                                        $debited_amount = $item->debited_amount;
                                        $paid_amount = $item->paid_amount;
                                        if($debited_amount > $paid_amount){
                                            $balance = $debited_amount - $paid_amount;
                                        }else{
                                            $balance = $paid_amount - $debited_amount;
                                        }
                                    @endphp
                                    <td><span class="border badge border-danger text-danger">{{ $balance }}</span></td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-primary btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editDebtModal" data-id="{{ $item->id }}"><i data-feather="credit-card"></i></button></td>
                                </tr>
                                @endforeach
                                {{-- @foreach ($debtPurchases as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->order_value) }}</td>
                                    <td> {{ number_format($item->paid_amount) }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>Sales of order No: {{ $item->id }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td><span class="border badge border-danger text-danger">{{ ($item->order_value) - ($item->paid_amount)}}</span></td>
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editCreditModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                        <x-loans.debtmodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script>
    $(function(){
        $("#payment").select2({
            dropdownParent: $("#addDebtModal")
        });
    });
    $(function(){
        $("#debtors_name").select2({
            dropdownParent: $("#addDebtModal"),
            tags: true,
            templateResult: function (data){
                var $result = $("<span></span>");
                $result.text(data.text);
                if(data.newOption){
                    $result.append("<em> [Create Customer]</em>");
                }
                return $result; 
            },
            createTag: function (params){
                return {
                    id: 'added_'+params.term,
                    text: params.term,
                    newOption: true,
                    
                }
            }
        });
    });
</script>
<script src="{{ asset('/frontend/assets/js/loans/debts.js') }}"></script>
</body>
</html> 