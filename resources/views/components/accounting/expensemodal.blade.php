<!-- Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addExpenseModalLabel">Add Expenses Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $accountsData = App\Models\Accounting\Account::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('expenses.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="expense_name" class="form-label">Expense Name</label>
                            <input type="text" class="form-control @error('expense_name') is-invalid @enderror" placeholder="Expense Name" id="expense_name" name="expense_name" autocomplete="off" value="{{ old('expense_name') }}"/>
                            @error('expense_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="expense_amount" class="form-label">Paid Amount</label>
                            <input type="number" class="form-control @error('expense_amount') is-invalid @enderror" placeholder="Paid Amount" id="expense_amount" name="expense_amount" autocomplete="off" value="{{ old('expense_amount') }}"/>
                            @error('expense_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="expense_description" class="form-label">Description:</label>
                            <input type="text" class="form-control @error('expense_description') is-invalid @enderror" placeholder="Expense Description" id="expense_description" name="expense_description" autocomplete="off" value="{{ old('expense_description') }}"/>
                            @error('expense_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="account" class="form-label">Account</label>
                            <select class="form-select @error('account') is-invalid @enderror" id="account" name="account">
                                <option value="" selected disabled>Select Receiver</option>
                                @foreach ($accountsData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->account_name }} - {{ $item->account_type }}- {{ $item->account_number }}</option>
                                @endforeach
                            </select>
                            @error('account')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>               
                    <div class="mb-3">
                        <label for="expense_receipt" class="items-center text-center form-label">Payment Receipt:</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="expense_receipt" name="expense_receipt">
                        </div>
                        @error('expense_receipt')
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
            $('#addExpenseModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editExpenseModal" tabindex="-1" aria-labelledby="editExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editExpenseModalLabel">Edit Expenses Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('expenses.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="expense_name" class="form-label">Expense Name</label>
                        <input type="text" class="form-control @error('expense_name') is-invalid @enderror" id="editExpense_name" name="expense_name" autocomplete="off" placeholder="Expense Name">
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
