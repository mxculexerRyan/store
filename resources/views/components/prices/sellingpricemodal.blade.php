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
                            <select class="js-example-basic-single form-select form-control" data-width="100%" name="product_name" id="product_name"> 
                                <label for="product_name" class="form-label">Select Product</label>
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
                            <label for="min_qty" class="form-label">Minnimum Quantity</label>
                            <input type="text" class="form-control @error('min_qty') is-invalid @enderror" id="min_qty" name="min_qty" autocomplete="off" placeholder="Minnimum Quantity" value="{{ old('min_qty') }}">
                            @error('min_qty')
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
                        <input type="text" class="form-control @error('editSellprice_id') is-invalid @enderror" name="sellPrice_id" id="editSellprice_id" autocomplete="off" placeholder="Sell Price Id" hidden>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="editProduct_name" autocomplete="off" placeholder="Product Name">
                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="Retail Price" class="form-label">Retail Price</label>
                                <input type="text" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" id="editSelling_price" placeholder="Selling Price">
                                @error('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="min_qty" class="form-label">Minnimum Quantity</label>
                                <input type="text" class="form-control @error('min_qty') is-invalid @enderror" name="min_qty" id="edit_min_qty" placeholder="Minnimum Quantity">
                                @error('min_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="Shop Price" class="form-label">Shop Price</label>
                                <input type="text" class="form-control @error('shop_price') is-invalid @enderror" name="shop_price" id="edit_shop_price" placeholder="Shop Price">
                                @error('shop_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="shop_qty" class="form-label">Shop Quantity</label>
                                <input type="text" class="form-control @error('shop_qty') is-invalid @enderror" name="shop_qty" id="edit_shop_qty" placeholder="Shop Quantity">
                                @error('shop_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="Caton Price" class="form-label">Caton Price</label>
                                <input type="text" class="form-control @error('caton_price') is-invalid @enderror" name="caton_price" id="edit_caton_price" placeholder="Caton Price">
                                @error('caton_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="caron_qty" class="form-label">Caton Quantity</label>
                                <input type="text" class="form-control @error('caton_qty') is-invalid @enderror" name="caton_qty" id="edit_caton_qty" placeholder="Caton Quantity">
                                @error('caton_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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

