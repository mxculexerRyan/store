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
                            <label for="tagname" class="form-label">Tag Name</label>
                            <input type="text" class="form-control @error('tagname') is-invalid @enderror" id="tagname" name="tagname" autocomplete="off" placeholder="Tag Name">
                            @error('tagname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagkey" class="form-label">Tag Key</label>
                            <input type="text" class="form-control @error('tagkey') is-invalid @enderror" name="tagkey" id="tagkey" placeholder="Tag Key">
                            @error('tagkey')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagdesc" class="form-label">Tag Description</label>
                            <input type="text" class="form-control @error('tagdesc') is-invalid @enderror" name="tagdesc" id="tagdesc" placeholder="Tag Description">
                            @error('tagdesc')
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
                        <div class="mb-3">
                            <label for="tagname" class="form-label">Tag Name</label>
                            <input type="text" class="form-control @error('tagname') is-invalid @enderror" id="tagname" name="tagname" autocomplete="off" placeholder="Tag Name">
                            @error('tagname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagkey" class="form-label">Tag Key</label>
                            <input type="text" class="form-control @error('tagkey') is-invalid @enderror" name="tagkey" id="tagkey" placeholder="Tag Key">
                            @error('tagkey')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagdesc" class="form-label">Tag Description</label>
                            <input type="text" class="form-control @error('tagdesc') is-invalid @enderror" name="tagdesc" id="tagdesc" placeholder="Tag Description">
                            @error('tagdesc')
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

<!-- Modal -->
<div class="modal fade" id="deleteTagModal" tabindex="-1" aria-labelledby="deleteTagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="deleteTagModalLabel">Delete Tags Form</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            
            <form class="forms-sample" method="POST" action="{{ route('tags.delete') }}">
                @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="tagname" class="form-label">Tag Name</label>
                            <input type="text" class="form-control @error('tagname') is-invalid @enderror" id="tagname" name="tagname" autocomplete="off" placeholder="Tag Name">
                            @error('tagname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagkey" class="form-label">Tag Key</label>
                            <input type="text" class="form-control @error('tagkey') is-invalid @enderror" name="tagkey" id="tagkey" placeholder="Tag Key">
                            @error('tagkey')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tagdesc" class="form-label">Tag Description</label>
                            <input type="text" class="form-control @error('tagdesc') is-invalid @enderror" name="tagdesc" id="tagdesc" placeholder="Tag Description">
                            @error('tagdesc')
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

