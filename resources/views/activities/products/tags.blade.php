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
                            <h6 class="card-title">Tags List</h6>
                        </div>
                        <div>
                            <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addTagModal">
                                <i class="btn-icon-prepend" data-feather="tag"></i>Add Tag 
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tag Name</th>
                                <th>Tag Key</th>
                                <th>Tag Description</th>
                                <th>Tag Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tagData as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->tag_name }}</td>
                                <td>{{ $item->tag_key }}</td>
                                <td>{{ $item->tag_desc }}</td>
                                <td>@if ($item->tag_status == "available")
                                    <span class="border badge border-success text-success">{{ $item->tag_status }}</span>
                                @else
                                <span class="border badge border-warning text-warning">{{ $item->tag_status }}</span>
                                @endif</td>
                                <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editTagModal" data-id="{{ $item->id }}"><i data-feather="edit"></i></button></td>
                                <td><button type="button" id="d_{{ $item->id }}" class="btn btn-inverse-danger btn-icon dltBtn" ><i data-feather="trash-2"></i></button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-product.tagmodal/>
                </div>
            </div>
        </div>
    </div>

</div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/products/tags.js') }}"></script>
</body>
</html> 