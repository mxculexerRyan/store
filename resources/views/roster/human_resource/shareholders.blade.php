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
                            <h6 class="card-title">Shareholders List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addShareholderModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Shareholders 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                {{-- <th>Email</th> --}}
                                <th>Phone</th>
                                <th>Location</th>
                                {{-- <th>Payment</th>
                                <th>Account</th> --}}
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($shareholderData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->location }}</td>
                                @php
                                    $role_id = $item->role;
                                    $roleDetails = App\Models\Hr\Role::find($role_id);
                                    @endphp
                                <td>{{ $roleDetails->roles }}</td>
                                <td><button type="button" class="btn btn-inverse-warning btn-icon" data-bs-toggle="modal" data-bs-target="#editShareholderModal"><i data-feather="edit"></i></button></td>
                                <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-hr.shareholdermodal/>
                </div>
            </div>
        </div>
    </div>

</div>
<x-pagebottom/>
<script>
    $(function(){
        $("#role_name").select2({
            dropdownParent: $("#addShareholderModal")
        });
    });
</script>
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 