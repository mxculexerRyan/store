<!-- Modal -->
<div class="modal fade" id="editStocksModal" tabindex="-1" aria-labelledby="editStocksModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editStocksModalLabel">Edit Stocks Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('stocks.edit') }}">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id" autocomplete="off" placeholder="Product Id" hidden>
                    <div class="mb-3">
                        <label for="products_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('products_name') is-invalid @enderror" id="editProducts_name" name="products_name" autocomplete="off" placeholder="Product Name" readonly>
                        @error('products_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="available_qty" class="form-label">Available Qty</label>
                        <input type="text" class="form-control @error('available_qty') is-invalid @enderror" id="editAvailable_qty" name="available_qty" autocomplete="off" placeholder="Available Qty">
                        @error('available_qty')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="products_value" class="form-label">Product Value:</label>
                        <input type="text" class="form-control @error('products_value') is-invalid @enderror" placeholder="Products Value" id="editProductsValue" name="products_value" autocomplete="off" value="{{ old('products_value') }}" readonly>
                        @error('products_value')
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
