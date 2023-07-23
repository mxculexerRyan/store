<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addProductModalLabel">Add Products Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $brandData = App\Models\Brand::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('products.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="brand_name" class="form-label">Select Brand</label>
                            <select class="form-select" id="brand_name" name="brand_name">
                                <option value="" selected disabled>Select Corresponding Brand</option>
                                @foreach ($brandData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->brand_key }} - {{ $item->brand_name }}</option>
                                @endforeach
                            </select>
                            @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" autocomplete="off" placeholder="Product Name" value="{{ old('product_name') }}">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_key" class="form-label">Product Key</label>
                            <input type="text" class="form-control @error('product_key') is-invalid @enderror" name="product_key" id="product_key" autocomplete="off" placeholder="Product Key" value="{{ old('product_key') }}">
                            @error('product_key')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_desc" class="form-label">Product Description</label>
                            <input type="text" class="form-control @error('product_desc') is-invalid @enderror" name="product_desc" id="product_desc" autocomplete="off" placeholder="Product Description" value="{{ old('product_key') }}">
                            @error('product_desc')
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
            $('#addProductModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editProductModalLabel">Edit Products Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('products.edit') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="editProduct_name" name="product_name" autocomplete="off" placeholder="Product Name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_key" class="form-label">Product Key</label>
                            <input type="text" class="form-control @error('product_key') is-invalid @enderror" name="product_key" id="editProduct_key" placeholder="Product Key">
                            @error('product_key')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_desc" class="form-label">Product Description</label>
                            <input type="text" class="form-control @error('product_desc') is-invalid @enderror" name="product_desc" id="editProduct_desc" placeholder="Product Description">
                            @error('product_desc')
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
