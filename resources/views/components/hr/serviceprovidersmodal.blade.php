<!-- Modal -->
<div class="modal fade" id="addService_providersModal" tabindex="-1" aria-labelledby="addService_providerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addService_providerModalLabel">Add Service Providers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('service_providers.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_name" class="me-2 form-label">Name</label>
                            <input type="text" class="form-control @error('service_provider_name') is-invalid @enderror" id="service_provider_name" name="service_provider_name" autocomplete="off" placeholder="Service Provider Name" value="{{ old('service_provider_name') }}">
                            @error('service_provider_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_email" class="form-label">Email:</label>
                            <input class="form-control @error('service_provider_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Service Provider Email" id="service_provider_email" name="service_provider_email" autocomplete="off" value="{{ old('service_provider_email') }}"/>
                            @error('service_provider_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_phone" class="form-label">Phone</label>
                            <input class="form-control @error('service_provider_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Service Provider Phone" id="service_provider_phone" name="service_provider_phone" autocomplete="off" value="{{ old('service_provider_phone') }}"/>
                            @error('service_provider_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('service_provider_location') is-invalid @enderror" id="service_provider_location" name="service_provider_location" autocomplete="off" placeholder="Service Provider Location" value="{{ old('service_provider_location') }}">
                            @error('service_provider_location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_bank" class="form-label">Service Provider Bank:</label>
                            <input type="service_provider_bank" class="form-control @error('service_provider_bank') is-invalid @enderror" placeholder="Service Provider Bank" id="service_provider_bank" name="service_provider_bank" autocomplete="off" value="{{ old('service_provider_bank') }}"/>
                            @error('service_provider_bank')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="service_provider_account" class="form-label">Service Provider Account:</label>
                            <input type="service_provider_account" class="form-control @error('service_provider_account') is-invalid @enderror" data-inputmask-alias="9999-9999-9999-9999" placeholder="Service Provider Account" id="service_provider_account" name="service_provider_account" autocomplete="off" value="{{ old('service_provider_account') }}"/>
                            @error('service_provider_account')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="providers_photo" class="items-center text-center form-label">Providers Photo:</label>
                        <div class="mb-3">
                            <input type="file" class="form-control @error('providers_photo') is-invalid @enderror" id="providers_photo" name="providers_photo">
                        </div>
                        @error('providers_photo')
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
            $('#addService_providerModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editService_providerModal" tabindex="-1" aria-labelledby="editService_providerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editService_providerModalLabel">Edit Service Providers Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('service_providers.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="service_provider_name" class="form-label">Service Provider Name</label>
                        <input type="text" class="form-control @error('service_provider_name') is-invalid @enderror" id="editService_provider_name" name="service_provider_name" autocomplete="off" placeholder="Service Provider Name">
                        @error('service_provider_name')
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
