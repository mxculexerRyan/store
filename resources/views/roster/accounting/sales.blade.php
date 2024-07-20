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
    
    <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Sales Reords</h4>
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
                                <th>Order</th>
                                <th>Item Name</th>
                                <th>S-Price</th>
                                <th>Sold Quantity</th>
                                <th>Sales Cost</th>
                                <th>Date</th>
                                <th>Ret</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($salesData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->order_id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->sold_quantity }}</td>
                                <td>{{ $item->vat_fees + $item->item_discount }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-primary btn-icon rtnBtn" data-bs-toggle="modal" data-bs-target="#returnSalesModal" data-id="{{ $item->id }}"><i data-feather="arrow-left-circle"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editSaleModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.salemodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
<script>
    $(function(){
        $(".prodname").select2({
            dropdownParent: $("#returnSalesModal")
        });
    });
</script>
<script src="{{ asset('/frontend/assets/js/accounting/sales.js') }}"></script>
</body>
</html> 