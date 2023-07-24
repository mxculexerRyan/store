<!-- Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addEmployeeModalLabel">Add Employees Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            @php $roleData = App\Models\Role::latest()->get();@endphp
            <form class="forms-sample" method="POST" action="{{ route('employees.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="employee_name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" autocomplete="off" placeholder="Employee Name" value="{{ old('employee_name') }}">
                            @error('employee_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="employee_email" class="form-label">Employee Email:</label>
                            <input class="form-control @error('employee_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Employee Email" id="employee_email" name="employee_email" autocomplete="off" value="{{ old('employee_email') }}"/>
                            @error('employee_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="employee_phone" class="form-label">Employee Phone No:</label>
                            <input class="form-control @error('employee_phone') is-invalid @enderror" data-inputmask-alias="(+999) 999-999-999" placeholder="Employee Phone" id="employee_phone" name="employee_phone" autocomplete="off" value="{{ old('employee_phone') }}"/>
                            @error('employee_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Employee Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Employee Password" id="password" name="password" autocomplete="off" value="{{ old('employee_phone') }}"/>
                            @error('employee_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Employee Role</label>
                            <select class="form-select" id="role_name" name="role_name">
                                <option value="" selected disabled>Employee Role</option>
                                @foreach ($roleData as $key => $item)
                                    <option value="{{ $item->id }}">{{ $key+1 }} - {{ $item->roles }}</option>
                                @endforeach
                            </select>
                            @error('role_name')
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
            $('#addEmployeeModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editEmployeeModalLabel">Edit Employees Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('employees.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="employee_name" class="form-label">Employee Name</label>
                        <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="editEmployee_name" name="employee_name" autocomplete="off" placeholder="Employee Name">
                        @error('employee_name')
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
