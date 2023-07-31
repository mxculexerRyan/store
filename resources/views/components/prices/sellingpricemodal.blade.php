<!-- Modal -->
<div class="modal fade" id="addSellingPriceModal" tabindex="-1" aria-labelledby="addSellingPriceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addSellingPriceModalLabel">Add Selling Price Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('sold.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Select Product</label>
                            <select class="form-select" id="product_name" name="product_name">
                                <option value="" selected disabled>Select Product</option>
                                @foreach ($productId as $key => $item)
                                    @php 
                                        $id = $item->product_id;
                                        $productData = App\Models\Product::find($id); @endphp
                                    <option value="{{ $productData->id }}">{{ $key+1 }} - {{ $productData->product_key }} - {{ $productData->product_name }}</option>
                                @endforeach
                            </select>
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="minimum_qty" class="form-label">Minimum Quantity</label>
                            <input type="text" class="form-control @error('minimum_qty') is-invalid @enderror" id="minimum_qty" name="minimum_qty" autocomplete="off" placeholder="Minimum Quantity" value="{{ old('minimum_qty') }}">
                            @error('minimum_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="selling_price" class="form-label">Selling Price</label>
                            <input type="text" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price" autocomplete="off" placeholder="Selling Price" value="{{ old('selling_price') }}">
                            @error('selling_price')
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
            $('#addSellingPriceModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editSellingPriceModal" tabindex="-1" aria-labelledby="editSellingPriceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editSellingPriceModalLabel">Edit Selling Price Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('sold.edit') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="editProduct_name" autocomplete="off" placeholder="Product Name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="supplier_name" class="form-label">Supplier Name</label>
                            <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" id="editSupplier_name" placeholder="Supplier Name">
                            @error('supplier_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="selling_price" class="form-label">Selling Price</label>
                            <input type="text" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" id="editSelling_price" placeholder="Selling Price">
                            @error('selling_price')
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

