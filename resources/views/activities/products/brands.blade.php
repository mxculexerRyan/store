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
                                <h6 class="card-title">Brands List</h6>
                            </div>
                            <div>
                                <button type="button" class="items-center d-flex btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                                    <i class="btn-icon-prepend" data-feather="tag"></i>Add Brands 
                                </button>
                            </div>
                        </div>
                        {{-- <select name="" id="tags">
                            <option value="test">test</option>
                        </select> --}}
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Brands Name</th>
                                    <th>Brands Key</th>
                                    <th>Brands Description</th>
                                    <th>Brands Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($brandData as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->brand_name }}</td>
                                    <td>{{ $item->brand_key }}</td>
                                    <td>{{ $item->brand_desc }}</td>
                                    <td>@if ($item->brand_status == "available")
                                        <span class="border badge border-success text-success">{{ $item->brand_status }}</span>
                                    @else
                                    <span class="border badge border-warning text-warning">{{ $item->brand_status }}</span>
                                    @endif</td>
                                    <td><button type="button" id="{{ $item->id }}" class="btn btn-inverse-warning btn-icon editBtn" data-bs-toggle="modal" data-bs-target="#editBrandModal" data-id="{{ $item->id }}"><i data-feather="edit"></i></button></td>
                                    <td><button type="button" class="btn btn-inverse-danger btn-icon" onclick="showSwal('passing-parameter-execute-cancel')"><i data-feather="trash-2"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-product.brandmodal/>
                    </div>
                </div>
            </div>
        </div>

    </div>
<x-pagebottom/>
<script>
    $(function(){
        $("#tag_name").select2({
            tags: true,
            createTag: function (params){
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                }
            },
            templateResult: function (data){
                var $result = $("<span></span>");
                $result.text(data.text);
                if(data.newOption){
                    $result.append("<em>(new)</em>");
                }
                return $result; 
            },
            dropdownParent: $("#addBrandModal")
        });
    });
</script>
<script src="{{ asset('/frontend/assets/js/products/brands.js') }}"></script>
</body>
</html> 