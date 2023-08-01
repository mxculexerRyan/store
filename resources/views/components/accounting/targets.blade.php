<!-- Modal -->
<div class="modal fade" id="addTargetModal" tabindex="-1" aria-labelledby="addTargetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addTargetModalLabel">Add Targets Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('targets.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="entity_name" class="form-label">Entity Name:</label>
                            <input type="text" class="form-control @error('entity_name') is-invalid @enderror" placeholder="Entity Name" id="entity_name" name="entity_name" autocomplete="off" value="{{ old('entity_name') }}"/>
                            @error('entity_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="target_measure" class="form-label">Target Measere</label>
                            <select class="form-select @error('target_measure') is-invalid @enderror" id="target_measure" name="target_measure">
                                <option value="" selected disabled>Select Measure</option>
                                <option value="Sales">All Sales</option>
                                <option value="All">All Orders</option>
                                <option value="Purchases">All Purchases</option>
                                <option value="Brand Sales">Specified Brand Sales</option>
                                <option value="Product Sales">Specified Product Sales</option>
                                <option value="Brand Purchases">Specified Brand Purchases</option>
                                <option value="Product Purchases">Specified Product Purchases</option>
                            </select>
                            @error('target_measure')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="targeted_amount" class="form-label">Targeted Amount:</label>
                            <input type="text" class="form-control @error('targeted_amount') is-invalid @enderror" placeholder="Targeted Amount" id="target_value" name="targeted_amount" autocomplete="off" value="{{ old('targeted_amount') }}"/>
                            @error('targeted_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="deadline" class="form-label">Deadline Date:</label>
                            <div class="input-group flatpickr" id="flatpickr-date">
                                <input type="text" class="form-control flatpickr-input" placeholder="Enter Deadline date" data-input="" readonly="readonly" id="deadline" name="deadline">
                                <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                            </div>
                            @error('deadline')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="assigned_group" class="form-label">Assigned Group</label>
                            <select class="form-select @error('assigned_group') is-invalid @enderror" id="assigned_group" name="assigned_group" onchange="getNames(this)">
                                <option value="" selected disabled>Assigned Group</option>
                                @foreach ($groupData as $key => $item)
                                    <option value="{{ $item->group_key }}">{{ $item->id }} - {{ $item->group_name }}</option>
                                @endforeach
                            </select>
                            @error('assigned_group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
            $('#addTargetModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editTargetModal" tabindex="-1" aria-labelledby="editTargetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editTargetModalLabel">Edit Targets Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('targets.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="expense_name" class="form-label">Target Name</label>
                        <input type="text" class="form-control @error('expense_name') is-invalid @enderror" id="editTarget_name" name="expense_name" autocomplete="off" placeholder="Target Name">
                        @error('expense_name')
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
