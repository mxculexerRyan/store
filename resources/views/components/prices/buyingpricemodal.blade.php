<!-- Modal -->
<div class="modal fade" id="addBuyingPriceModal" tabindex="-1" aria-labelledby="addBuyingPriceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addBuyingPriceModalLabel">Add Buying Price Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('bought.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Select Product</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" id="product_name" name="product_name">
                                <option value="" selected disabled>Select Product</option>
                                @foreach ($productData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->product_key }} - {{ $item->product_name }}</option>
                                @endforeach
                            </select>
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Buying Price</label>
                            <input type="text" class="form-control @error('product_price') is-invalid @enderror" id="product_price" name="product_price" autocomplete="off" placeholder="Product Price" value="{{ old('product_price') }}">
                            @error('product_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="min_qty" class="form-label">Minnimum Quantity</label>
                            <input type="text" class="form-control @error('min_qty') is-invalid @enderror" id="min_qty" name="min_qty" autocomplete="off" placeholder="Minnimum Quantity" value="{{ old('min_qty') }}">
                            @error('min_qty')
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
            $('#addBuyingPriceModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editBuyingPriceModal" tabindex="-1" aria-labelledby="editBuyingPriceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editBuyingPriceModalLabel">Edit Buying Price Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('bought.edit') }}">
                @csrf
                <div class="modal-body">
                        <input type="text" class="form-control @error('buyprice_id') is-invalid @enderror" name="buyprice_id" id="editBuyprice_id" autocomplete="off" placeholder="Product Name" hidden>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="editProduct_name" autocomplete="off" placeholder="Product Name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="buying_price" class="form-label">Buying Price</label>
                            <input type="text" class="form-control @error('buying_price') is-invalid @enderror" name="buying_price" id="editBuying_price" placeholder="Buying Price">
                            @error('buying_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="min_qty" class="form-label">Minnimum Quantity</label>
                            <input type="text" class="form-control @error('min_qty') is-invalid @enderror" name="min_qty" id="edit_min_qty" placeholder="Minnimum Quantity">
                            @error('min_qty')
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

