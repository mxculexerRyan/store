<x-pagetop/>
<div class="page-content">

    <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Purchases Records</h4>
        </div>
        <div class="flex-wrap d-flex align-items-center text-nowrap">
            <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
            <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
            <input type="text" class="bg-transparent form-control border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="mb-2 btn btn-outline-primary btn-icon-text me-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="printer"></i>
            Print
            </button>
            <button type="button" class="mb-2 btn btn-primary btn-icon-text mb-md-0">
            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
            Download Report
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Sold Items</h6>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order Id</th>
                                <th>Item Name</th>
                                <th>Buying Price</th>
                                <th>Purchased Quantity</th>
                                <th>Additional Cost</th>
                                <th>Order Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($salesData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->buying_price }}</td>
                                <td>{{ $item->purchased_quantity }}</td>
                                <td>{{ $item->vat_fees + $item->item_discount }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editSaleModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.purchasemodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 