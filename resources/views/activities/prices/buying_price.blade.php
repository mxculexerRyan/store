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
                                <h6 class="card-title">Buying Prices</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addBuyingPriceModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Buying Price 
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Supplier Name</th>
                                    <th>Buying Price</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($buying_priceData as $key => $item)
                                <tr>
                                    @php
                                        $productId      = $item->product_id;
                                        $productData    = App\Models\Product::find($productId);

                                        $supplierId     = $item->supplier_id;
                                        $supplierData   = App\Models\Hr\Shareholder::find($supplierId);
                                    @endphp
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $productData->product_name }}</td>
                                    <td>{{ $supplierData->name }}</td>
                                    <td>{{ $item->buying_price }}</td>
                                    <td>@if ($item->status == "Available")
                                        <span class="border badge border-success text-success">{{ $item->status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->status }}</span>
                                    @endif</td>
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editBuyingPriceModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-prices.buyingpricemodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script>
$(function(){
        $("#product_name").select2({
            dropdownParent: $("#addBuyingPriceModal")
        });
        $("#supplier_name").select2({
            dropdownParent: $("#addBuyingPriceModal")
        });
    });
</script>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 