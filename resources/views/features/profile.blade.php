<x-pagetop/>
    <div class="page-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active d-flex align-items-center" id="about-tab" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">
                <i class="me-1 icon-md" data-feather="user"></i>About</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link d-flex align-items-center" id="cv-tab" data-bs-toggle="tab" href="#cv" role="tab" aria-controls="cv" aria-selected="false">
                <i class="me-1 icon-md" data-feather="folder"></i>CV</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link d-flex align-items-center" id="events-tab" data-bs-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false">
                <i class="me-1 icon-md" data-feather="calendar"></i>Events</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link d-flex align-items-center" id="contract-tab" data-bs-toggle="tab" href="#contract" role="tab" aria-controls="contract" aria-selected="false">
                <i class="me-1 icon-md" data-feather="book"></i>Contract</a>
            </li>
        </ul>
        <div class="p-3 border tab-content border-top-0" id="myTabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="row profile-body">
                    <!-- left wrapper start -->
                    <div class="mb-2 left-wrapper col-md-7 col-xl-9 ">
                        <div class="row">
                            <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0 card-title">About Me</h6>
                                            <div class="dropdown">
                                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="view();"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                                                </div>
                                            </div>
                                        </div>
                                            <form method="POST" action="{{ route('features.profile.update') }}" class="forms-sample" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Fullname</label>
                                                            <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter name" value="{{ $profileData->name }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="uname" placeholder="Enter User name" value="{{ $profileData->uname }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ $profileData->phone }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter User name" value="{{ $profileData->email }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">ID Number</label>
                                                            <input type="text" class="form-control" id="id_number" placeholder="Enter Id number" value="KS001001" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Street</label>
                                                            <input type="text" class="form-control" id="street" placeholder="Enter street" value="Nyasho" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">District</label>
                                                            <input type="text" class="form-control" id="district" placeholder="Enter district" value="Musoma" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Region</label>
                                                            <input type="text" class="form-control" id="region" placeholder="Enter Region" value="Mara" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">Birtdate</label>
                                                        <div class="mb-3 input-group flatpickr" id="flatpickr-date">
                                                            <input type="text" class="form-control" id="birthdate" placeholder="Select date" data-input value="23/02/1999" disabled>
                                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Birth Region</label>
                                                            <input type="text" class="form-control" id="birthreg" placeholder="Enter birth region" value="Mara" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nationality</label>
                                                            <input type="text" class="form-control" id="nationality" placeholder="Enter nationality" value="Tanzanian" disabled>
                                                        </div>
                                                    </div>
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Gender</label>
                                                            <input type="text" class="form-control" id="gender" placeholder="Enter Gender" value="Male" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Marital Status</label>
                                                            <input type="text" class="form-control" id="marital" placeholder="Enter marital status" value="Single" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Religion</label>
                                                            <input type="text" class="form-control" id="religion" placeholder="Enter Religion" value="Seventh Day Adventist" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Position</label>
                                                            <input type="text" class="form-control" id="position" placeholder="Enter Position" value="{{ $role->roles }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Salary Cap</label>
                                                            <input type="text" class="form-control" id="salary" placeholder="Enter salary cap" value="500,000/=" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control d-none" id="photo" name="profile_photo_path">
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="justify-content-end text-end">
                                                        <input type="submit" id="update_btn" value="Update" class="d-none btn btn-primary btn-icon-text">
                                                    </div>
                                                </div><!-- Row -->
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- left wrapper end -->
                    <!-- right wrapper start -->
                    <div class="col-md-5 col-xl-3">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="rounded card">
                                    <div class="card-body">
                                        {{-- <h6 class="card-title">latest photos</h6> --}}
                                        <div class="row ms-0 me-0">
                                            <a href="javascript:;" class="col-md-12 ps-1 pe-1">
                                            <figure class="mb-2 text-end">
                                                <img class="rounded img-fluid" id="showimage" src="{{ (!empty($profileData->profile_photo_path))? url('uploads/images/'.$profileData->id.'/'.$profileData->profile_photo_path) :  url('/images/240x240.PNG')}}" alt="profile">
                                            </figure>
                                            </a>
                                            <button type="button" id="photo_btn" class="d-none btn btn-primary btn-icon-text" onclick="getImg()">
                                                <i class="btn-icon-prepend" data-feather="camera"></i>
                                                Change Photo 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-margin">
                                <div class="rounded card">
                                    <div class="card-body">
                                        <h6 class="card-title">Personal Description</h6>
                                        <p class="tx-14 text-muted">Ryana Tumaini is an Intelligent, Confident, Confidential and a very Influencial character, Acts fast when needed to.  
                                        </p><br>
                                        <p class="tx-14 text-muted">Having five year experience in the software engineering field he is a conservative individual in the company culture   
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right wrapper end -->
                </div>
            </div>
            <div class="tab-pane fade" id="cv" role="tabpanel" aria-labelledby="cv-tab">cv Tab</div>
            <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">Events Tab</div>
            <div class="tab-pane fade" id="contract" role="tabpanel" aria-labelledby="contract-tab">Contract Tab</div>
        </div>
    </div>
<x-pagebottom/>
<script src="{{ asset('/frontend/assets/js/features/profile.js') }}"></script>
</body>
</html> 