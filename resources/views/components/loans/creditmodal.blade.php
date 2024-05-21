<!-- Modal -->
<div class="modal fade" id="addCreditModal" tabindex="-1" aria-labelledby="addCreditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addCreditModalLabel">Add Credits Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('credits.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="creditors_name" class="form-label">Creditor's Name</label>
                            <input type="text" class="form-control @error('creditors_name') is-invalid @enderror" id="creditors_name" name="creditors_name" autocomplete="off" placeholder="Creditor's Name" value="{{ old('creditors_name') }}">
                            @error('creditors_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="credited_amount" class="form-label">Credited Amount</label>
                            <input type="number" class="form-control @error('credited_amount') is-invalid @enderror" name="credited_amount" id="credited_amount" autocomplete="off" placeholder="Credited Amount" value="{{ old('credited_amount') }}">
                            @error('credited_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="creditors_phone" class="form-label">Creditors Phone</label>
                            <input type="text" class="form-control @error('creditors_phone') is-invalid @enderror" name="creditors_phone" id="creditors_phone" autocomplete="off" placeholder="Creditors Phone" value="{{ old('creditors_phone') }}">
                            @error('creditors_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="credit_reason" class="form-label">Credit Reason</label>
                            <input type="text" class="form-control @error('credit_reason') is-invalid @enderror" name="credit_reason" id="credit_reason" autocomplete="off" placeholder="Credit Reason" value="{{ old('credit_reason') }}">
                            @error('credit_reason')
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
            $('#addCreditModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editCreditModal" tabindex="-1" aria-labelledby="editCreditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editCreditModalLabel">Edit Credit Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('credits.edit') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_creditors_name" class="form-label">Creditor's Name</label>
                            <input type="text" class="form-control @error('edit_creditors_name') is-invalid @enderror" id="edit_creditors_name" name="edit_creditors_name" autocomplete="off" placeholder="Creditor's Name">
                            @error('edit_creditors_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_credited_amount" class="form-label">Credited Amount</label>
                            <input type="text" class="form-control @error('edit_credited_amount') is-invalid @enderror" name="edit_credited_amount" id="edit_credited_amount" placeholder="Credited Amount">
                            @error('edit_credited_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_creditors_phone" class="form-label">Creditor's Phone</label>
                            <input type="text" class="form-control @error('edit_creditors_phone') is-invalid @enderror" name="edit_creditors_phone" id="edit_creditors_phone" placeholder="Creditor's Phone">
                            @error('edit_creditors_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="edit_credit_reason" class="form-label">Credit Reason</label>
                            <input type="text" class="form-control @error('edit_credit_reason') is-invalid @enderror" name="edit_credit_reason" id="edit_credit_reason" placeholder="Credit Reason">
                            @error('edit_credit_reason')
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
