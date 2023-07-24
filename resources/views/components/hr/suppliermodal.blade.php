<!-- Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addSupplierModalLabel">Add Suppliers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $roleData = App\Models\Role::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('suppliers.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_name" class="me-2 form-label">Name</label>
                            <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" name="supplier_name" autocomplete="off" placeholder="Supplier Name" value="{{ old('supplier_name') }}">
                            @error('supplier_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_email" class="form-label">Email:</label>
                            <input class="form-control @error('supplier_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Supplier Email" id="supplier_email" name="supplier_email" autocomplete="off" value="{{ old('supplier_email') }}"/>
                            @error('supplier_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_phone" class="form-label">Phone</label>
                            <input class="form-control @error('supplier_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Supplier Phone" id="supplier_phone" name="supplier_phone" autocomplete="off" value="{{ old('supplier_phone') }}"/>
                            @error('supplier_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('supplier_location') is-invalid @enderror" id="supplier_location" name="supplier_location" autocomplete="off" placeholder="Supplier Location" value="{{ old('supplier_location') }}">
                            @error('supplier_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_bank" class="form-label">Supplier Bank:</label>
                            <input type="supplier_bank" class="form-control @error('supplier_bank') is-invalid @enderror" placeholder="Supplier Bank" id="supplier_bank" name="supplier_bank" autocomplete="off" value="{{ old('supplier_bank') }}"/>
                            @error('supplier_bank')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="supplier_account" class="form-label">Supplier Account:</label>
                            <input type="supplier_account" class="form-control @error('supplier_account') is-invalid @enderror" data-inputmask-alias="9999-9999-9999-9999" placeholder="Supplier Account" id="supplier_account" name="supplier_account" autocomplete="off" value="{{ old('supplier_account') }}"/>
                            @error('supplier_account')
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
                <h3 class="modal-title" id="editSupplierModalLabel">Edit Suppliers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('suppliers.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="supplier_name" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" id="editSupplier_name" name="supplier_name" autocomplete="off" placeholder="Supplier Name">
                        @error('supplier_name')
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
