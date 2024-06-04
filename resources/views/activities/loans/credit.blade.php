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
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                    <td><span class="border badge border-danger text-danger">{{ ($item->credited_amount) - ($item->paid_amount)}}</span></td>
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editCreditModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                @foreach ($creditSales as $key => $item)
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
                                @endforeach
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
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 