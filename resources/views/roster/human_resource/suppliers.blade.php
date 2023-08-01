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
                            <h6 class="card-title">Suppliers List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Supplier 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                {{-- <th>Email</th> --}}
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Bank</th>
                                <th>Account</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($supplierData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @if ($item->photo != "")
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('uploads/images/'.$item->id.'/'.$item->photo)}}" alt="userr"></td>
                                @else
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('/images/30x30.PNG') }}"></td>
                                @endif
                                <td>{{ $item->name }}</td>
                                {{-- <td>{{ $item->supplier_email }}</td> --}}
                                <td>{{ $item->supplier_phone }}</td>
                                <td>{{ $item->supplier_location }}</td>
                                <td>{{ $item->supplier_bank }}</td>
                                <td>{{ $item->supplier_account }}</td>
                                <td>@if ($item->supplier_status == "available")
                                    <span class="border badge border-success text-success">{{ $item->supplier_status }}</span>
                                @else
                                <span class="border badge border-warning text-warning">{{ $item->supplier_status }}</span>
                                @endif</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editSupplierModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-hr.suppliermodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 