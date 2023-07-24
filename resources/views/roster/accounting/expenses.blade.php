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
                            <h6 class="card-title">Expenses List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
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
                                <th>Budjet Name</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Receiver</th>
                                <th>Sender</th>
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
                                    $budjet_id = $item->budjet_id; $budjetDetails = App\Models\Budjet::find($budjet_id);
                                    $receiver_id = $item->paid_to; $receiverDetails = App\Models\Service_provider::find($receiver_id);
                                    $payer_id = $item->paid_by; $userDetails = App\Models\User::find($payer_id);
                                @endphp
                                <td>{{ $budjetDetails->budjet_name }}</td>
                                <td>{{ $item->expense_description }}</td>
                                <td>{{ $item->expense_amount }}</td>
                                <td>{{ $receiverDetails->provider_name }}</td>
                                <td>{{ $userDetails->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editSupplierModal"><i data-feather="edit"></i></button></td>
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