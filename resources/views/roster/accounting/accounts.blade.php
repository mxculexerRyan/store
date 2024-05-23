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
                            <h6 class="card-title">Accounts List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addAccountsModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Account 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Account Type</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($accountsData as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->account_type }}</td>
                                    <td>{{ $item->account_name }}</td>
                                    <td>{{ $item->account_number }}</td>
                                    <td>{{ $item->account_balance }}</td>
                                    <td>@if ($item->account_status = "available")
                                        <span class="border badge border-success text-success">{{ $item->account_status }}</span>
                                    @else
                                        <span class="border badge border-danger text-danger">{{ $item->account_status }}</span>
                                    @endif</td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editAccountsModal" data-id="{{ $item->id }}" ><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-accounting.accountsmodal/>
                </div>
            </div>
        </div>
    </div>
</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/accounting/accounts.js') }}"></script>
</body>
</html> 