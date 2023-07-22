<x-pagetop/>
    <div class="page-content">
        <div class="flex-row d-flex col">
            {{-- <div class="d-none d-md-block col-md-2"></div> --}}
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Change Password</h6>

                        <form method="POST" action="{{ route('features.account.update') }}" class="forms-sample">
                            @csrf
                            <div class="mb-3 row">
                                <label for="uname" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="uname" name="uname" autocomplete="off" placeholder="Current Password" value="{{ $profileData->uname }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="cpassword" class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" name="cpassword" autocomplete="off" placeholder="Current Password">
                                    @error('cpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="npassword" class="col-sm-3 col-form-label">Confirm New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('npassword') is-invalid @enderror" id="password_confirmation" name="password_confirmation" autocomplete="off" placeholder="New Password">
                                    @error('npassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <input type="submit" value="Update" class="btn btn-primary me-2">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<x-pagebottom/>
</body>
</html> 