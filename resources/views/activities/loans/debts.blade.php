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
                                    {{-- <th>No.</th> --}}
                                    <th>Debtor's Name</th>
                                    <th>Debited Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Debtor's Phone</th>
                                    <th>Reason</th>
                                    <th>Due date</th>
                                    <th>Balance</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($debtsData as $key => $item)
                                <tr>
                                    {{-- <td>{{ $key+1 }}</td> --}}
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
                                    <td>{{ $item->debited_amount }}</td>
                                    <td>{{ $item->paid_amount }}</td>
                                    <td>{{ $debtorsphone }}</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td><span class="border badge border-danger text-danger">{{ ($item->debited_amount) - ($item->paid_amount)}}</span></td>
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editDebtModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                @foreach ($debtPurchases as $key => $item)
                                <tr>
                                    {{-- <td>{{ $key+1 }}</td> --}}
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
                                @endforeach
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
            dropdownParent: $("#addDebtModal")
        });
    });
</script>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 