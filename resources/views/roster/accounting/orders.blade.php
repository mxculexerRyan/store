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
                            <h6 class="card-title">Order List</h6>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Item Quantity</th>
                                <th>Order Value</th>
                                <th>Oder Type</th>
                                <th>Seller</th>
                                <th>Receiver</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orderData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->items_quantity }}</td>
                                <td>{{ $item->order_value }}</td>
                                <td>{{ $item->spent_amount }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>@if ($item->projected_amount > $item->spent_amount)
                                    <span class="border badge border-success text-success">under</span>
                                @elseif ($item->projected_amount == $item->spent_amount)
                                    <span class="border badge border-warning text-warning">equal</span>
                                @else
                                    <span class="border badge border-danger text-danger">over</span>
                                @endif</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editBudjetModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.budjetmodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 