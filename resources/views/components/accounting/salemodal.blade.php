<!-- Modal -->
<div class="modal fade" id="editSalesModal" tabindex="-1" aria-labelledby="editSalesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editSalesModalLabel">Edit Items Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('sales.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control @error('item_name') is-invalid @enderror" id="editItem_name" name="item_name" autocomplete="off" placeholder="Item Name">
                        @error('item_name')
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
<div class="modal fade" id="returnSalesModal" tabindex="-1" aria-labelledby="returnSalesModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="returnSalesModalLabel">Sales Returns Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('sales.return') }}">
                @csrf
                <input type="text" name="item_id" id="retunItem_id" value="" hidden>
                <input type="text" name="selling_price" id="selling_price" value="" hidden>
                <input type="text" name="buying_price" id="buying_price" value="" hidden>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="returnsItem_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control @error('item_name') is-invalid @enderror" id="returnsItem_name" name="item_name" autocomplete="off" placeholder="Item Name" readonly>
                        @error('returnsItem_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="returnsPurch_qty" class="form-label">Purchased Quantity</label>
                            <input type="text" class="form-control @error('returnsPurch_qty') is-invalid @enderror" id="returnsPurch_qty" name="purch_qty" autocomplete="off" placeholder="Purchased Quantity" readonly>
                            @error('returnsPurch_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="returns_qty" class="form-label">Returned Quantity</label>
                            <input type="text" class="form-control @error('returns_qty') is-invalid @enderror" id="returns_qty" name="returns_qty" autocomplete="off" placeholder="Returned Quantity">
                            @error('returns_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="prod_value" class="form-label">Product Value</label>
                            <input type="text" id="prod_value" class="form-control @error('prod_value') is-invalid @enderror" id="returns_amt" name="prod_value" autocomplete="off" placeholder="Product Amount">
                            @error('prod_value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="returns_amt" class="form-label">Returned Amount</label>
                            <input type="text" class="form-control @error('returns_amt') is-invalid @enderror" id="returns_amt" name="returns_amt" autocomplete="off" placeholder="Returned Amount">
                            @error('returns_amt')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select form-control" data-width="100%" name="payment_method" id="payment_method">
                            <option value="" selected disabled>Payment Methods</option>
                            @foreach ($accountsData as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->account_name }} - {{ $item->account_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Returned Reason</label>
                        <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" autocomplete="off" placeholder="Reason">
                        @error('reason')
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
            $('#addSalesModal').modal('show'); 
        });
    </script>
@endif