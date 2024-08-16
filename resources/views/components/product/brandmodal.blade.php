<!-- Modal -->
<div class="modal fade" id="addBrandModal" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addBrandModalLabel">Add Brands Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('brands.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="brand_name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name" autocomplete="off" placeholder="Brand Name" value="{{ old('brand_name') }}">
                            @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand_key" class="form-label">Brand Key</label>
                            <input type="text" class="form-control @error('brand_key') is-invalid @enderror" name="brand_key" id="brand_key" autocomplete="off" placeholder="Brand Key" value="{{ old('brand_key') }}">
                            @error('brand_key')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand_desc" class="form-label">Brand Description</label>
                            <input type="text" class="form-control @error('brand_desc') is-invalid @enderror" name="brand_desc" id="brand_desc" autocomplete="off" placeholder="Brand Description" value="{{ old('brand_key') }}">
                            @error('brand_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if (Session::has('errors'))
    <script>
        $(document).ready(function(){
            console.log("object");
            $('#addBrandModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editBrandModalLabel">Edit Brands Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('brands.edit') }}">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control @error('brand_id') is-invalid @enderror" id="edit_brand_id" name="brand_id" autocomplete="off" placeholder="Brand Id" hidden>
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="edit_brand_name" name="brand_name" autocomplete="off" placeholder="Brand Name">
                        @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand_key" class="form-label">Brand Key</label>
                        <input type="text" class="form-control @error('brand_key') is-invalid @enderror" name="brand_key" id="edit_brand_key" placeholder="Brand Key">
                        @error('brand_key')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand_desc" class="form-label">Brand Description</label>
                        <input type="text" class="form-control @error('brand_desc') is-invalid @enderror" name="brand_desc" id="edit_brand_desc" placeholder="Brand Description">
                        @error('brand_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

