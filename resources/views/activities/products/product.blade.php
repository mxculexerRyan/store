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
                                        $tag_id = $brandDetails->tag_id;
                                        $tagDetails = App\Models\Tag::find($tag_id);
                                    @endphp
                                    <td>{{ $key+1 }}</td>
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
                                    <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editBrandModal"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-productmodals/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 