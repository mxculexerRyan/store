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