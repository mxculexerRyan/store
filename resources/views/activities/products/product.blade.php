<x-pagetop/>
    <div class="page-content">

        <div class="flex-wrap d-flex justify-content-between align-items-center grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Products Reords</h4>
            </div>
            <div class="flex-wrap d-flex align-items-center text-nowrap">
                <div class="mb-2 input-group flatpickr wd-200 me-2 mb-md-0" id="dashboardDate">
                    <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="bg-transparent form-control border-primary" placeholder="Select date" data-input>
                </div>
                <button type="button" class="mb-2 btn btn-outline-primary btn-icon-text me-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>Print
                </button>
                <a href="{{ URL::route('getProductsPdf') }}" class="mb-2 btn btn-primary btn-icon-text mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>Download
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Products List</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Products 
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tag</th>
                                    <th>Brand</th>
                                    <th>Products</th>
                                    <th>Key</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($productData as $key => $item)
                                <tr>
                                    @php
                                        $brand_id = $item->brand_id;
                                        $brandDetails = App\Models\Brand::find($brand_id);
                                        $tag_id = $item->tag_id;
                                        $tagDetails = App\Models\Tag::find($tag_id);
                                    @endphp
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $tagDetails->tag_name }}</td>
                                    <td>{{ $brandDetails->brand_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_key }}</td>
                                    <td>{{ $item->product_desc }}</td>
                                    <td>@if ($item->product_status == "available")
                                        <span class="border badge border-success text-success">{{ $item->product_status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->product_status }}</span>
                                    @endif</td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editProductModal" data-id="{{ $item->id }}" ><i data-feather="edit"></i></button></td>
                                    <td><button type="button" id="d_{{ $item->id }}" class="btn btn-inverse-danger btn-icon dltBtn" ><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-product.productmodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/products/products.js') }}"></script>
</body>
</html> 