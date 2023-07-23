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
                            <h6 class="card-title">Employees List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Employee 
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employeeData as $key => $item)
                            <tr>
                                @php
                                    $role_id = $item->role_id;
                                    $roleDetails = App\Models\Role::find($role_id);
                                @endphp
                                <td>{{ $key+1 }}</td>
                                @if ($item->photo != "")
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('uploads/images/'.$item->id.'/'.$item->photo)}}" alt="userr"></td>
                                @else
                                    <td><img class="wd-30 ht-30 rounded-circle" src="{{ url('/images/30x30.PNG') }}"></td>
                                @endif
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $roleDetails->roles }}</td>
                                <td>@if ($item->status == "available")
                                    <span class="border badge border-success text-success">{{ $item->status }}</span>
                                @else
                                <span class="border badge border-warning text-warning">{{ $item->status }}</span>
                                @endif</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-hr.employeemodal/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Input Mask</h6>
                    <p class="mb-3 text-muted">Read the <a href="https://github.com/RobinHerbots/Inputmask" target="_blank"> Official Inputmask Documentation </a>for a full list of instructions and other options.</p>
                    <form class="forms-sample">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label class="form-label">Phone:</label>
                                <input class="mb-4 form-control mb-md-0" data-inputmask-alias="(+99) 9999-9999"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email:</label>
                                <input class="mb-4 form-control mb-md-0" data-inputmask="'alias': 'email'"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 