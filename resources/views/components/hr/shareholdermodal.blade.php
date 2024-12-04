<!-- Modal -->
<div class="modal fade" id="addShareholderModal" tabindex="-1" aria-labelledby="addShareholderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addShareholderModalLabel">Add Shareholder Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php 
            $roleData = App\Models\Hr\Role::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('shareholders.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="shareholders_name" class="form-label">Shareholder's Name</label>
                            <input type="text" class="form-control @error('shareholders_name') is-invalid @enderror" id="shareholders_name" name="shareholders_name" autocomplete="off" placeholder="Shareholder's Name" value="{{ old('shareholders_name') }}">
                            @error('shareholders_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="shareholders_email" class="form-label">Shareholder's Email:</label>
                            <input class="form-control @error('shareholder_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Shareholder's Email" id="shareholders_email" name="shareholders_email" autocomplete="off" value="{{ old('shareholders_email') }}"/>
                            @error('shareholders_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="shareholders_phone" class="form-label">Shareholder's Phone No:</label>
                            <input class="form-control @error('shareholders_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Shareholder's Phone" id="shareholders_phone" name="shareholders_phone" autocomplete="off" value="{{ old('shareholders_phone') }}"/>
                            @error('shareholders_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="shareholders_location" class="form-label">Shareholder's Location:</label>
                            <input type="text" class="form-control @error('shareholders_location') is-invalid @enderror" placeholder="Shareholder's Location" id="shareholders_location" name="shareholders_location" autocomplete="off" value="{{ old('shareholders_location') }}"/>
                            @error('shareholders_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="payment_method" class="form-label">Payments Method:</label>
                            <input type="text" class="form-control @error('payment_method') is-invalid @enderror" placeholder="Payment Method" id="payment_method" name="payment_method" autocomplete="off" value="{{ old('payment_method') }}"/>
                            @error('payment_method')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="shareholders_account" class="form-label">Shareholder's Account:</label>
                            <input type="text" class="form-control @error('shareholders_account') is-invalid @enderror" placeholder="Shareholder's Account" id="shareholders_account" name="shareholders_account" autocomplete="off" value="{{ old('shareholders_account') }}"/>
                            @error('shareholders_account')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Shareholder's Role</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" id="role_name" name="role_name">
                                <option value="" selected disabled>Select Shareholder's Role</option>
                                @foreach ($roleData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->roles }}</option>
                                @endforeach
                            </select>
                            @error('role_name')
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
            $('#addShareholderModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editShareholderModal" tabindex="-1" aria-labelledby="editShareholderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editShareholderModalLabel">Edit Shareholder Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('shareholders.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="" id="edit_shareholders_id" name="shareholders_id" hidden>
                        <div class="mb-3 col-sm-6">
                            <label for="edit_shareholders_name" class="form-label">Shareholder's Name</label>
                            <input type="text" class="form-control @error('shareholders_name') is-invalid @enderror" id="edit_shareholders_name" name="shareholders_name" autocomplete="off" placeholder="Shareholder's Name" value="{{ old('shareholders_name') }}">
                            @error('shareholders_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="edit_shareholders_email" class="form-label">Shareholder's Email:</label>
                            <input class="form-control @error('shareholder_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Shareholder's Email" id="edit_shareholders_email" name="shareholders_email" autocomplete="off" value="{{ old('shareholders_email') }}"/>
                            @error('shareholders_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="edit_shareholders_phone" class="form-label">Shareholder's Phone No:</label>
                            <input class="form-control @error('shareholders_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Shareholder's Phone" id="edit_shareholders_phone" name="shareholders_phone" autocomplete="off" value="{{ old('shareholders_phone') }}"/>
                            @error('shareholders_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="edit_shareholders_location" class="form-label">Shareholder's Location:</label>
                            <input type="text" class="form-control @error('shareholders_location') is-invalid @enderror" placeholder="Shareholder's Location" id="edit_shareholders_location" name="shareholders_location" autocomplete="off" value="{{ old('shareholders_location') }}"/>
                            @error('shareholders_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="edit_role_name" class="form-label">Shareholder's Role</label>
                            <select class="form-select form-control" data-width="100%" id="edit_role_name" name="role_name">
                                <option value="" selected disabled>Select Shareholder's Role</option>
                                @foreach ($roleData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->roles }}</option>
                                @endforeach
                            </select>
                            @error('role_name')
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
