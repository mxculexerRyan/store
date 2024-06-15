<!-- Modal -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addTransactionModalLabel">Add Transactions Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $accountsData = App\Models\Accounting\Account::latest()->get();@endphp
            @php $shareholdersData = App\Models\Hr\shareholder::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('transactions.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="direction" class="form-label">Transaction Type</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" name="direction" id="direction" onchange="getFlow(this)">
                                <option value="" selected disabled>Choose Transaction Type</option>
                                <option value="Cash-in">Cash In</option>
                                <option value="Cash-out">Cash Out</option>
                                <option value="Transfered">Cash Transfer</option>
                            </select>
                            @error('direction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-sm-6">
                            <label for="amount" class="form-label">Transaction Amount:</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" placeholder="Transaction Amount" id="amount" name="amount" autocomplete="off" value="{{ old('amount') }}"/>
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="from" class="form-label">Transaction From</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" name="from" id="from">
                                <option value="" selected disabled>From</option>
                                <option value="shop">1 - Kanza Electronics (Shop) </option>
                                @foreach ($shareholdersData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+2 }} - {{ $item->name }}</option>
                                @endforeach
                                
                            </select>
                            @error('from')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="from" class="form-label">Transaction To</label>
                            <select class="js-example-basic-single form-select form-control" data-width="100%" name="to" id="to">
                                <option value="" selected disabled>To</option>
                                <option value="shop">1 - Kanza Electronics (Shop) </option>
                                @foreach ($shareholdersData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+2 }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3 col-sm-6">
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
                        <div class="mb-3 col-sm-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="description" name="description" autocomplete="off" value="{{ old('description') }}"/>
                            @error('description')
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
            $('#addTransactionModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editTransactionModalLabel">Edit Targets Form</h3>
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
