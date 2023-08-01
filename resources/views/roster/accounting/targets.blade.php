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
                            <h6 class="card-title">Targets List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addTargetModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Target 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Entity Name</th>
                                <th>Target Measure</th>
                                <th>Targeted Amount</th>
                                <th>Assigned to</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($targetData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->entity_name }}</td>
                                <td>{{ $item->target_measure }} @if ( $item->measure_specificity != "")
                                    of {{ $item->measure_specificity }}
                                @endif</td>
                                <td>{{ $item->targeted_amount }}</td>
                                @php
                                    $assigned_group = $item->assigned_group;
                                    $assigned_id = $item->assigned_to;
                                    $assigned_data  = DB::table($assigned_group)->where('id', $assigned_id)->first();
                                @endphp
                                <td>{{ $assigned_data->name }}</td>
                                <td>{{ $item->deadline }}</td>
                                <td>{{ $item->status }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editTargetModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.targets/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/target.js') }}"></script>
</body>
</html> 