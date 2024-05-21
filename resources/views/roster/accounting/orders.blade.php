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
                                <th>Order</th>
                                <th>Items</th>
                                <th>Value</th>
                                <th>Paid</th>
                                <th>Cost</th>
                                <th>From</th>
                                <th>Type</th>
                                <th>To</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orderData as $key => $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->items_quantity }}</td>
                                @if ($item->order_type == "order_in")
                                    <td>{{number_format($item->order_value - $item->order_discount ) }}</td>
                                    <td>{{number_format($item->paid_amount) }}</td>
                                    <td>{{number_format($item->shipping_fees) }}</td>
                                    <td>@php $fromId = $item->from; $fromData = App\Models\supplier::find($fromId);@endphp {{ $fromData->name }}</td>
                                    <td><span class="border badge border-primary text-primary">bought by</span></td>
                                    <td>@php $toId = $item->to; $toData = App\Models\user::find($toId);@endphp {{ $toData->name }}</td>
                                @else
                                <td>{{number_format($item->order_value - $item->order_discount ) }}</td>
                                <td>{{number_format($item->paid_amount ) }}</td>
                                <td>{{number_format($item->shipping_fees +  $item->order_discount) }}</td>
                                    <td>@php $fromId = $item->from; $fromData = App\Models\user::find($fromId);@endphp {{ $fromData->name }}</td>
                                    <td><span class="border badge border-success text-success">Sold to</span></td>
                                    <td>@php $toId = $item->to; $toData = App\Models\customer::find($toId);@endphp {{ $toData->name }}</td>                           
                                @endif
                                <td>{{ $item->created_at }}</td>
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