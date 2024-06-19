<!-- Modal -->
<div class="modal fade" id="addDebtModal" tabindex="-1" aria-labelledby="addDebtModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addCreditModalLabel">Add Debts Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $shareholdersData = DB::table('roles')->join('shareholders', 'roles.id', '=', 'shareholders.role')->get();@endphp
            @php $usersData = DB::table('roles')->join('users', 'roles.id', '=', 'users.role_id')->get();@endphp
            @php $accountsData = App\Models\Accounting\Account::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('debts.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="debtors_name" class="form-label">Select Debtor's Name</label>
                        <select class="js-example-basic-single form-select form-control" data-width="100%" id="debtors_name" name="debtors_name">
                            <option value="" selected disabled>Select Debtor's Name</option>
                            @php $key1 = 0; @endphp
                            @foreach ($shareholdersData as $key1 => $item)
                                <option value="s-{{ $item->id }}">{{ $key1+1 }} - {{ $item->name }} - {{ $item->roles }}</option>
                            @endforeach
                            @foreach ($usersData as $key => $item)
                            @php $key = $key1 + 1; @endphp
                                <option value="u-{{ $item->id }}">{{ $key+1 }} - {{ $item->name }} - {{ $item->roles }}</option>
                            @php $key1 = $key1 + 1; @endphp
                            @endforeach
                        </select>
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
                            <label for="debit_reason" class="form-label">Debit Reason</label>
                            <input type="text" class="form-control @error('debit_reason') is-invalid @enderror" name="debit_reason" id="debit_reason" autocomplete="off" placeholder="Debit Reason" value="{{ old('debit_reason') }}">
                            @error('debit_reason')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="payment" class="form-label">Select Payment Method</label>
                            <select class="form-select form-control" data-width="100%" name="payment" id="payment">
                                <option value="" selected disabled>Select Payment Method</option>
                                @foreach ($accountsData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->account_name }} - {{ $item->account_type }} - {{ $item->account_number }}</option>
                                @endforeach
                            </select>
                            @error('tag_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Payment Due Date</label>
                            <div class="mb-2 input-group flatpickr me-2 mb-md-0" id="dashboardDate">
                                <span class="bg-transparent input-group-text input-group-addon border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                                <input type="datetime-local" name="due_date" id="due_date" class="bg-transparent form-control border-primary" placeholder="Select date" data-input onchange="opend(this)">
                            </div>
                            @error('due_date')
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
<div class="modal fade" id="editDebtModal" tabindex="-1" aria-labelledby="editDebtModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editDebtModalLabel">Debt Payement Form</h3>
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
                        <input type="text" name="from" id="from" hidden>
                        <input type="text" name="debtId" id="debtId" hidden>
                        <div class="mb-3">
                            <label for="edit_balance_amount" class="form-label">Balance Amount</label>
                            <input type="text" class="form-control @error('edit_balance_amount') is-invalid @enderror" name="edit_balance_amount" id="edit_balance_amount" placeholder="Balance Amount">
                            @error('edit_balance_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="edit_payment" class="form-label">Paying Amount</label>
                            <input type="text" class="form-control @error('edit_payment') is-invalid @enderror" name="edit_payment" id="edit_payment" placeholder="Enter Paid Amount">
                            @error('edit_payment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3 form-group">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" name="payment_method" id="payment_method">
                                <option value="" selected disabled>Payment Methods</option>
                                @foreach ($accountsData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->account_name }} - {{ $item->account_type }}</option>
                                @endforeach
                            </select>
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
