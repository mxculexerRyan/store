<!-- Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addPartnerModalLabel">Add Partners Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('partners.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="partner_name" class="me-2 form-label">Name</label>
                            <input type="text" class="form-control @error('partner_name') is-invalid @enderror" id="partner_name" name="partner_name" autocomplete="off" placeholder="Partner Name" value="{{ old('partner_name') }}">
                            @error('partner_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="partner_email" class="form-label">Email:</label>
                            <input class="form-control @error('partner_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Partner Email" id="partner_email" name="partner_email" autocomplete="off" value="{{ old('partner_email') }}"/>
                            @error('partner_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="partner_phone" class="form-label">Phone</label>
                            <input class="form-control @error('partner_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Partner Phone" id="partner_phone" name="partner_phone" autocomplete="off" value="{{ old('partner_phone') }}"/>
                            @error('partner_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="partner_location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('partner_location') is-invalid @enderror" id="partner_location" name="partner_location" autocomplete="off" placeholder="Partner Location" value="{{ old('partner_location') }}">
                            @error('partner_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="partner_bank" class="form-label">Partner Bank:</label>
                            <input type="partner_bank" class="form-control @error('partner_bank') is-invalid @enderror" placeholder="Partner Bank" id="partner_bank" name="partner_bank" autocomplete="off" value="{{ old('partner_bank') }}"/>
                            @error('partner_bank')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="partner_account" class="form-label">Partner Account:</label>
                            <input type="partner_account" class="form-control @error('partner_account') is-invalid @enderror" data-inputmask-alias="9999-9999-9999-9999" placeholder="Partner Account" id="partner_account" name="partner_account" autocomplete="off" value="{{ old('partner_account') }}"/>
                            @error('partner_account')
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
            $('#addPartnerModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editPartnerModal" tabindex="-1" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editPartnerModalLabel">Edit Partners Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('partners.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="partner_name" class="form-label">Partner Name</label>
                        <input type="text" class="form-control @error('partner_name') is-invalid @enderror" id="editPartner_name" name="partner_name" autocomplete="off" placeholder="Partner Name">
                        @error('partner_name')
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
