<!-- Modal -->
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addTagModalLabel">Add Tags Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('tags.add') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="tag_name" class="form-label">Tag Name</label>
                            <input type="text" class="form-control @error('tag_name') is-invalid @enderror" id="tag_name" name="tag_name" autocomplete="off" placeholder="Tag Name">
                            @error('tag_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tag_key" class="form-label">Tag Key</label>
                            <input type="text" class="form-control @error('tag_key') is-invalid @enderror" name="tag_key" id="tag_key" autocomplete="off" placeholder="Tag Key">
                            @error('tag_key')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tag_desc" class="form-label">Tag Description</label>
                            <input type="text" class="form-control @error('tag_desc') is-invalid @enderror" name="tag_desc" id="tag_desc" autocomplete="off" placeholder="Tag Description">
                            @error('tag_desc')
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
            $('#addTagModal').modal('show'); 
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editTagModalLabel">Edit Tags Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('tags.edit') }}">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control @error('tag_id') is-invalid @enderror" id="edit_tag_id" name="tag_id" autocomplete="off" placeholder="Tag Id" hidden>
                    <div class="mb-3">
                        <label for="tag_name" class="form-label">Tag Name</label>
                        <input type="text" class="form-control @error('tag_name') is-invalid @enderror" id="edit_tag_name" name="tag_name" autocomplete="off" placeholder="Tag Name">
                        @error('tag_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tag_key" class="form-label">Tag Key</label>
                        <input type="text" class="form-control @error('tag_key') is-invalid @enderror" name="tag_key" id="edit_tag_key" placeholder="Tag Key">
                        @error('tag_key')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tag_desc" class="form-label">Tag Description</label>
                        <input type="text" class="form-control @error('tag_desc') is-invalid @enderror" name="tag_desc" id="edit_tag_desc" placeholder="Tag Description">
                        @error('tag_desc')
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


