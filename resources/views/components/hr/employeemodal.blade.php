<!-- Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmpolyeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addEmpolyeeModalLabel">Add Employees Form</h3>
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
                            <label for="employee_email" class="form-label">Email:</label>
                            <input class="form-control @error('employee_email') is-invalid @enderror" data-inputmask="'alias': 'email'" placeholder="Employee Email"/>
                        </div>
                        <div class="mb-3">
                            <label for="employee_email" class="form-label">Employee Email</label>
                            <input type="email" class="form-control @error('employee_email') is-invalid @enderror" id="employee_email" name="employee_email" autocomplete="off" placeholder="Employee Email" value="{{ old('employee_email') }}">
                            @error('employee_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Select Role</label>
                            <select class="form-select" id="role_name" name="role_name">
                                <option value="" selected disabled>Assign Role to Employee</option>
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
            $('#addEmpolyeeModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editEmpolyeeModal" tabindex="-1" aria-labelledby="editEmpolyeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editEmpolyeeModalLabel">Edit Employees Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('employees.edit') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="employee_name" class="form-label">Employee Name</label>
                        <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="editEmpolyee_name" name="employee_name" autocomplete="off" placeholder="Employee Name">
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
