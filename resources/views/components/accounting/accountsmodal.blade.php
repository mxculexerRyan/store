<!-- Modal -->
<div class="modal fade" id="addAccountsModal" tabindex="-1" aria-labelledby="addAccountsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addAccountsModalLabel">Add Accounts Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('accounts.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="account_type" class="form-label">Account Type</label>
                        <input type="text" class="form-control @error('account_type') is-invalid @enderror" placeholder="Account Type" id="account_type" name="account_type" autocomplete="off" value="{{ old('account_type') }}"/>
                        @error('account_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_name" class="form-label">Account Name</label>
                        <input type="text" class="form-control @error('account_name') is-invalid @enderror" placeholder="Account Name" id="account_name" name="account_name" autocomplete="off" value="{{ old('account_name') }}"/>
                        @error('account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number:</label>
                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" placeholder="Account Number" id="account_number" name="account_number" autocomplete="off" value="{{ old('account_number') }}"/>
                        @error('account_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_balance" class="form-label">Account Balance:</label>
                        <input type="number" class="form-control @error('account_balance') is-invalid @enderror" placeholder="Account Balance" id="account_balance" name="account_balance" autocomplete="off" value="{{ old('account_balance') }}"/>
                        @error('account_balance')
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
            $('#addAccountsModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editAccountsModal" tabindex="-1" aria-labelledby="editAccountsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editAccountsModalLabel">Edit Assets Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('accounts.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="account_type" class="form-label">Account Type</label>
                        <input type="text" class="form-control @error('account_type') is-invalid @enderror" id="editAccount_type" name="account_type" autocomplete="off" placeholder="Account Type">
                        @error('account_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_name" class="form-label">Account Name</label>
                        <input type="text" class="form-control @error('account_name') is-invalid @enderror" id="editAccount_name" name="account_name" autocomplete="off" placeholder="Account Name">
                        @error('account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number:</label>
                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" placeholder="Acoount Number" id="editAccount_number" name="account_number" autocomplete="off" value="{{ old('account_number') }}"/>
                        @error('account_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="account_balance" class="form-label">Account Balance:</label>
                        <input type="text" class="form-control @error('account_balance') is-invalid @enderror" placeholder="Acoount Balance" id="editAccount_balance" name="account_balance" autocomplete="off" value="{{ old('account_balance') }}"/>
                        @error('account_balance')
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
