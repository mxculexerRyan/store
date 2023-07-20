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
                                        <h6 class="card-title">About Me</h6>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Fullname</label>
                                                            <input type="text" class="form-control" placeholder="Enter name" value="{{ $profileData->name }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" placeholder="Enter User name" value="{{ $profileData->uname }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Enter phone" value="{{ $profileData->phone }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" class="form-control" placeholder="Enter User name" value="{{ $profileData->email }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">ID Number</label>
                                                            <input type="text" class="form-control" placeholder="Enter Id number" value="KS001001" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Street</label>
                                                            <input type="text" class="form-control" placeholder="Enter street" value="Nyasho" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">District</label>
                                                            <input type="text" class="form-control" placeholder="Enter district" value="Musoma" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Region</label>
                                                            <input type="text" class="form-control" placeholder="Enter Region" value="Mara" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label">Birtdate</label>
                                                        <div class="mb-3 input-group flatpickr" id="flatpickr-date">
                                                            <input type="text" class="form-control" placeholder="Select date" data-input value="23/02/1999" disabled>
                                                            <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Birth Region</label>
                                                            <input type="text" class="form-control" placeholder="Enter birth region" value="Mara" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nationality</label>
                                                            <input type="text" class="form-control" placeholder="Enter nationality" value="Tanzanian" disabled>
                                                        </div>
                                                    </div>
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Gender</label>
                                                            <input type="text" class="form-control" placeholder="Enter Gender" value="Male" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Marital Status</label>
                                                            <input type="text" class="form-control" placeholder="Enter marital status" value="Single" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Religion</label>
                                                            <input type="text" class="form-control" placeholder="Enter Religion" value="Seventh Day Adventist" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Position</label>
                                                            <input type="text" class="form-control" placeholder="Enter Position" value="{{ $role->roles }}" disabled>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Salary Cap</label>
                                                            <input type="text" class="form-control" placeholder="Enter salary cap" value="500,000/=" disabled>
                                                        </div>
                                                    </div><!-- Col -->
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
                                            <figure class="mb-2">
                                                <img class="rounded img-fluid" src="{{ asset('/images/240x240.PNG') }}" alt="">
                                            </figure>
                                            </a>
                                            
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
{{-- <script src="{{ asset('/frontend/assets/js/trade/sell.js') }}"></script> --}}
</body>
</html> 