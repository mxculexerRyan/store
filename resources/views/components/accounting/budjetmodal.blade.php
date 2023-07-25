<!-- Modal -->
<div class="modal fade" id="addBudjetModal" tabindex="-1" aria-labelledby="addBudjetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addBudjetModalLabel">Add Items Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('budjets.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control @error('item_name') is-invalid @enderror" placeholder="Item Name" id="item_name" name="item_name" autocomplete="off" value="{{ old('item_name') }}"/>
                        @error('item_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="projected_amount" class="form-label">Projected Amount:</label>
                        <input type="text" class="form-control @error('projected_amount') is-invalid @enderror" placeholder="Projected Amount" id="projected_amount" name="projected_amount" autocomplete="off" value="{{ old('projected_amount') }}"/>
                        @error('projected_amount')
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
            $('#addBudjetModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editBudjetModal" tabindex="-1" aria-labelledby="editBudjetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editBudjetModalLabel">Edit Items Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('budjets.edit') }}">
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
