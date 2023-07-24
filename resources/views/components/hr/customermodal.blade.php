<!-- Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addSupplierModalLabel">Add Customers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('customers.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="customer_name" class="me-2 form-label">Name</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" autocomplete="off" placeholder="Customer Name" value="{{ old('customer_name') }}">
                            @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="customer_email" class="form-label">Email:</label>
                            <input class="form-control @error('customer_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Customer Email" id="customer_email" name="customer_email" autocomplete="off" value="{{ old('customer_email') }}"/>
                            @error('customer_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="customer_phone" class="form-label">Phone</label>
                            <input class="form-control @error('customer_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Customer Phone" id="customer_phone" name="customer_phone" autocomplete="off" value="{{ old('customer_phone') }}"/>
                            @error('customer_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="customer_location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('customer_location') is-invalid @enderror" id="customer_location" name="customer_location" autocomplete="off" placeholder="Customer Location" value="{{ old('customer_location') }}">
                            @error('customer_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="customer_bank" class="form-label">Customer Bank:</label>
                            <input type="customer_bank" class="form-control @error('customer_bank') is-invalid @enderror" placeholder="Customer Bank" id="customer_bank" name="customer_bank" autocomplete="off" value="{{ old('customer_bank') }}"/>
                            @error('customer_bank')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="customer_account" class="form-label">Customer Account:</label>
                            <input type="customer_account" class="form-control @error('customer_account') is-invalid @enderror" data-inputmask-alias="9999-9999-9999-9999" placeholder="Customer Account" id="customer_account" name="customer_account" autocomplete="off" value="{{ old('customer_account') }}"/>
                            @error('customer_account')
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

@if (Session::has('errors'))
    <script>
        $(document).ready(function(){
            console.log("object");
            $('#addSupplierModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editSupplierModalLabel">Edit Customers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('customers.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="editSupplier_name" name="customer_name" autocomplete="off" placeholder="Customer Name">
                        @error('customer_name')
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
