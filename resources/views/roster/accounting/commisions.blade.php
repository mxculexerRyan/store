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

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Commisions List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addCommisionModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Commision 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Entity Name</th>
                                <th>Minimum Amount</th>
                                <th>rates</th>
                                <th>status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($commisionData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                @php
                                    $assigned_group = $item->assigned_group ;
                                    $assigned_id = $item->assigned_to;
                                    $assigned_data  = DB::table($assigned_group)->where('id', $assigned_id)->first();
                                @endphp
                                <td>{{ $assigned_data->name }}</td>
                                <td>{{ $item->commision_base }}</td>
                                <td>{{ $item->minimum_amount }}</td>
                                <td>{{ $item->rates }}</td>
                                <td>{{ $item->status }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editCommisionModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.commisionmodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/commisions.js') }}"></script>
</body>
</html> 