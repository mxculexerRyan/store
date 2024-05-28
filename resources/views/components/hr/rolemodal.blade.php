<!-- Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addRole_nameLabel">Add Roles Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('roles.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Role Name</label>
                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" autocomplete="off" placeholder="Role Name">
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
            $('#addRoleModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editRoleModalLabel">Edit Roles Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('roles.edit') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Role Name</label>
                            <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="editRole_name" name="role_name" autocomplete="off" placeholder="Role Name">
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


