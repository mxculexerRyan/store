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
                            <h6 class="card-title">Partners List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Roles 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roleData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->roles }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editPartnerModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-hr.rolemodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 