<!-- Modal -->
<div class="modal fade" id="addDebtModal" tabindex="-1" aria-labelledby="addDebtModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addCreditModalLabel">Add Debts Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('debts.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="debtors_name" class="form-label">Debtor's Name</label>
                            <input type="text" class="form-control @error('debtors_name') is-invalid @enderror" id="debtors_name" name="debtors_name" autocomplete="off" placeholder="Debtor's Name" value="{{ old('debtors_name') }}">
                            @error('debtors_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="debited_amount" class="form-label">Debited Amount</label>
                            <input type="number" class="form-control @error('debited_amount') is-invalid @enderror" name="debited_amount" id="debited_amount" autocomplete="off" placeholder="Debited Amount" value="{{ old('debited_amount') }}">
                            @error('debited_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="debtors_phone" class="form-label">Debtor's Phone</label>
                            <input type="text" class="form-control @error('debtors_phone') is-invalid @enderror" name="debtors_phone" id="debtors_phone" autocomplete="off" placeholder="Debtor's Phone" value="{{ old('debtors_phone') }}">
                            @error('debtors_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="debit_reason" class="form-label">Debit Reason</label>
                            <input type="text" class="form-control @error('debit_reason') is-invalid @enderror" name="debit_reason" id="debit_reason" autocomplete="off" placeholder="Debit Reason" value="{{ old('debit_reason') }}">
                            @error('debit_reason')
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
            $('#addDebtModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editDebtModal" tabindex="-1" aria-labelledby="eeditDebtModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editDebtModalLabel">Edit Credit Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('debts.edit') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_debtors_name" class="form-label">Debtor's Name</label>
                            <input type="text" class="form-control @error('edit_debtors_name') is-invalid @enderror" id="edit_debtors_name" name="edit_debtors_name" autocomplete="off" placeholder="Debtor's Name">
                            @error('edit_debtors_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_debited_amount" class="form-label">Debited Amount</label>
                            <input type="text" class="form-control @error('edit_debited_amount') is-invalid @enderror" name="edit_debited_amount" id="edit_debited_amount" placeholder="Debited Amount">
                            @error('edit_debited_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_debtors_phone" class="form-label">Debtor's Phone</label>
                            <input type="text" class="form-control @error('edit_debtors_phone') is-invalid @enderror" name="edit_debtors_phone" id="edit_debtors_phone" placeholder="Debtor's Phone">
                            @error('edit_debtors_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="edit_debit_reason" class="form-label">Debit Reason</label>
                            <input type="text" class="form-control @error('edit_debit_reason') is-invalid @enderror" name="edit_debit_reason" id="edit_debit_reason" placeholder="Debit Reason">
                            @error('edit_debit_reason')
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
