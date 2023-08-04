<!-- Modal -->
<div class="modal fade" id="addCommisionModal" tabindex="-1" aria-labelledby="addCommisionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addCommisionModalLabel">Add Commisions Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form id="myForm" class="forms-sample" method="POST" action="{{ route('commisions.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 form-group col-sm-6">
                            <label for="assigned_group" class="form-label">Assigned Group</label>
                            <select class="form-select" id="assigned_group" name="assigned_group" onchange="getNames(this)">
                                <option value="" selected disabled>Assigned Group</option>
                                @foreach ($groupData as $key => $item)
                                    <option value="{{ $item->group_key }}">{{ $item->id }} - {{ $item->group_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="assigned_to" class="form-label">Assigned To</label>
                            <select class="form-select @error('assigned_to') is-invalid @enderror" id="assigned_to" name="assigned_to">
                                <option value="" selected disabled>Assigned To</option>
                            </select>
                            @error('assigned_to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="commision_base" class="form-label">Commision Based On</label>
                            <select class="form-select @error('commision_base') is-invalid @enderror" id="commision_base" name="commision_base">
                                <option value="" selected disabled>Select Measure</option>
                                <option value="Sales">All Sales</option>
                                <option value="All">All Orders</option>
                                <option value="Purchases">All Purchases</option>
                                <option value="Brand Sales">Specified Brand Sales</option>
                                <option value="Product Sales">Specified Product Sales</option>
                                <option value="Brand Purchases">Specified Brand Purchases</option>
                                <option value="Product Purchases">Specified Product Purchases</option>
                            </select>
                            @error('commision_base')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="minimum_amount" class="form-label">Minimum Amount</label>
                            <input type="text" class="form-control @error('minimum_amount') is-invalid @enderror" placeholder="Minnimum Amount" id="minimum_amount" name="minimum_amount" autocomplete="off" value="{{ old('minimum_amount') }}"/>
                            @error('minimum_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="rates" class="form-label">Commision Rates:</label>
                            <input type="text" class="form-control @error('rates') is-invalid @enderror" placeholder="Commision Rate" id="rates" name="rates" autocomplete="off" value="{{ old('rates') }}"/>
                            @error('rates')
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
            $('#addCommisionModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editCommisionModal" tabindex="-1" aria-labelledby="editCommisionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editCommisionModalLabel">Edit Commisions Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('commisions.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="commision_name" class="form-label">Commision Name</label>
                        <input type="text" class="form-control @error('commision_name') is-invalid @enderror" id="editCommision_name" name="commision_name" autocomplete="off" placeholder="Commision Name">
                        @error('commision_name')
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
