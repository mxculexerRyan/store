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
                            <h6 class="card-title">Customers List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Customer 
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
                            @foreach ($customerData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @if ($item->photo != "")
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('uploads/images/'.$item->id.'/'.$item->photo)}}" alt="userr"></td>
                                @else
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('/images/30x30.PNG') }}"></td>
                                @endif
                                <td>{{ $item->name }}</td>
                                {{-- <td>{{ $item->customer_email }}</td> --}}
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->payement_method }}</td>
                                <td>{{ $item->account_number }}</td>
                                <td>@if ($item->status == "available")
                                    <span class="border badge border-success text-success">{{ $item->status }}</span>
                                @else
                                <span class="border badge border-warning text-warning">{{ $item->status }}</span>
                                @endif</td>
                                <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editCustomerModal" data-id="{{ $item->id }}"><i data-feather="edit"></i></button></td>
                                <td><button type="button" id="d_{{ $item->id }}" class="btn btn-inverse-danger btn-icon dltBtn" ><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-hr.customermodal/>
                </div>
            </div>
        </div>
    </div>

</div>
<x-pagebottom/>
</body>
</html> 