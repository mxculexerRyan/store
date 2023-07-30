<!-- Modal -->
<div class="modal fade" id="addAssetsModal" tabindex="-1" aria-labelledby="addAssetsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addAssetsModalLabel">Add Assets Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('asset.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="asset_name" class="form-label">Asset Name</label>
                        <input type="text" class="form-control @error('asset_name') is-invalid @enderror" placeholder="Asset Name" id="asset_name" name="asset_name" autocomplete="off" value="{{ old('asset_name') }}"/>
                        @error('asset_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="asset_amount" class="form-label">Asset Name</label>
                        <input type="text" class="form-control @error('asset_amount') is-invalid @enderror" placeholder="Asset Amount" id="asset_amount" name="asset_amount" autocomplete="off" value="{{ old('asset_amount') }}"/>
                        @error('asset_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="asset_value" class="form-label">Asset Value:</label>
                        <input type="text" class="form-control @error('asset_value') is-invalid @enderror" placeholder="Asset Value" id="asset_value" name="asset_value" autocomplete="off" value="{{ old('asset_value') }}"/>
                        @error('asset_value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="asset_type" class="form-label">Asset Type</label>
                        <select class="form-control @error('asset_type') is-invalid @enderror" id="asset_type" name="asset_type" value="{{ old('assets_amount') }}">
                        <option value="" selected disabled>Select Asset Type</option>
                            <option value="current">Current Assest</option>
                            <option value="fixed">Fixed Assest</option>
                            <option value="investments">Investment</option>
                            <option value="intangible">Intangible Assets</option>
                        </select>
                        @error('asset_type')
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
            $('#addAssetsModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editAssetsModal" tabindex="-1" aria-labelledby="editAssetsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editAssetsModalLabel">{{ $assetData }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('asset.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="assets_name" class="form-label">Assets Name</label>
                        <input type="text" class="form-control @error('assets_name') is-invalid @enderror" id="editAssets_name" name="assets_name" autocomplete="off" placeholder="Assets Name">
                        @error('assets_name')
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
