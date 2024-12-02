<!-- Modal -->
<div class="modal fade" id="editOrdersModal" tabindex="-1" aria-labelledby="editOrdersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editOrdersModalLabel">Edit Orders Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('orders.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="orders\_type" class="form-label">Order Type</label>
                        <input type="text" class="form-control @error('orders\_type') is-invalid @enderror" id="editOrders_type" name="orders\_type" autocomplete="off" placeholder="Order Type">
                        @error('orders\_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orders\_name" class="form-label">Order Name</label>
                        <input type="text" class="form-control @error('orders\_name') is-invalid @enderror" id="editOrders_name" name="orders\_name" autocomplete="off" placeholder="Order Name">
                        @error('orders\_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orders\_number" class="form-label">Order Number:</label>
                        <input type="text" class="form-control @error('orders\_number') is-invalid @enderror" placeholder="Acoount Number" id="editOrders_number" name="orders\_number" autocomplete="off" value="{{ old('orders\_number') }}"/>
                        @error('orders\_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orders\_balance" class="form-label">Order Balance:</label>
                        <input type="text" class="form-control @error('orders\_balance') is-invalid @enderror" placeholder="Acoount Balance" id="editOrders_balance" name="orders\_balance" autocomplete="off" value="{{ old('orders\_balance') }}"/>
                        @error('orders\_balance')
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
