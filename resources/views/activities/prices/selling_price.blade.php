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
                                <h6 class="card-title">Selling Prices</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addSellingPriceModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Selling Price 
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Caton Prices</th>
                                    <th>Shop Prices</th>
                                    <th>Retail Price</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($Selling_priceData as $key => $item)
                                <tr>
                                    @php
                                        $productId      = $item->product_id;
                                        $productData    = App\Models\Product::find($productId);
                                    @endphp
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $productData->product_name }}</td>
                                    <td>{{ number_format($item->caton_price) }}</td>
                                    <td>{{ number_format($item->shop_price) }}</td>
                                    <td>{{ number_format($item->selling_price) }}</td>
                                    <td>@if ($item->status == "Available")
                                        <span class="border badge border-success text-success">{{ $item->status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->status }}</span>
                                    @endif</td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editSellingPriceModal" data-id="{{ $item->id }}"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" id="d_{{ $item->id }}" class="btn btn-inverse-danger btn-icon dltBtn" ><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-prices.sellingpricemodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/prices/selling_prices.js') }}"></script>
<script>
    $(function(){
        $("#product_name").select2({
            dropdownParent: $("#addSellingPriceModal")
        });
    });
</script>
</body>
</html> 