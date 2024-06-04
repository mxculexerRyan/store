<!-- Modal -->
<div class="modal fade" id="addCreditModal" tabindex="-1" aria-labelledby="addCreditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addCreditModalLabel">Add Credits Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $shareholdersData = DB::table('roles')->join('shareholders', 'roles.id', '=', 'shareholders.role')->get();@endphp
            @php $usersData = DB::table('roles')->join('users', 'roles.id', '=', 'users.role_id')->get();@endphp
            @php $accountsData = App\Models\Accounting\Account::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('credits.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="creditors_name" class="form-label">Select Creditor's Name</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" id="creditors_name" name="creditors_name">
                                <option value="" selected disabled>Select Creditor's Name</option>
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
                            <label for="account" class="form-label">Payment Method</label>
                            <select class="form-select form-control" data-width="100%" name="account" id="account">
                                <option value="" selected disabled>Select Payment Method</option>
                                @foreach ($accountsData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->account_name }} - {{ $item->account_type }} - {{ $item->account_number }}</option>
                                @endforeach
                            </select>
                            @error('account')
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
