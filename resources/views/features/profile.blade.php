<x-pagetop/>
<div class="page-content">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="p-3 d-flex justify-content-center rounded-bottom">
            <ul class="p-0 m-0 d-flex align-items-center">
              <li class="d-flex align-items-center active">
                <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
              </li>
              <li class="ms-3 ps-3 border-start d-flex align-items-center">
                <i class="me-1 icon-md" data-feather="user"></i>
                <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
              </li>
              <li class="ms-3 ps-3 border-start d-flex align-items-center">
                <i class="me-1 icon-md" data-feather="users"></i>
                <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
              </li>
              <li class="ms-3 ps-3 border-start d-flex align-items-center">
                <i class="me-1 icon-md" data-feather="image"></i>
                <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
              </li>
              <li class="ms-3 ps-3 border-start d-flex align-items-center">
                <i class="me-1 icon-md" data-feather="video"></i>
                <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row profile-body position-relative">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="rounded card">
          <div class="card-body">
            <div class="mb-2 d-flex align-items-center justify-content-between">
              <h6 class="mb-0 card-title">About</h6>
              <div class="dropdown">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                </div>
              </div>
            </div>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="mb-0 tx-11 fw-bolder text-uppercase">Joined:</label>
              <p class="text-muted">November 15, 2015</p>
            </div>
            <div class="mt-3">
              <label class="mb-0 tx-11 fw-bolder text-uppercase">Lives:</label>
              <p class="text-muted">New York, USA</p>
            </div>
            <div class="mt-3">
              <label class="mb-0 tx-11 fw-bolder text-uppercase">Email:</label>
              <p class="text-muted">me@nobleui.com</p>
            </div>
            <div class="mt-3">
              <label class="mb-0 tx-11 fw-bolder text-uppercase">Website:</label>
              <p class="text-muted">www.nobleui.com</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="rounded card">
              <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="img-xs rounded-circle" src="{{ asset('images/37x37.png')}}" alt="">													
                    <div class="ms-2">
                      <p>Mike Popescu</p>
                      <p class="tx-11 text-muted">1 min ago</p>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="meh" class="icon-sm me-2"></i> <span class="">Unfollow</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="corner-right-up" class="icon-sm me-2"></i> <span class="">Go to post</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="share-2" class="icon-sm me-2"></i> <span class="">Share</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy link</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus minima delectus nemo unde quae recusandae assumenda.</p>
                <img class="img-fluid" src="{{ asset('images/689x430.png')}}" alt="">
              </div>
              <div class="card-footer">
                <div class="d-flex post-actions">
                  <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                    <i class="icon-md" data-feather="heart"></i>
                    <p class="d-none d-md-block ms-2">Like</p>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                    <i class="icon-md" data-feather="message-square"></i>
                    <p class="d-none d-md-block ms-2">Comment</p>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center text-muted">
                    <i class="icon-md" data-feather="share"></i>
                    <p class="d-none d-md-block ms-2">Share</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->
    </div>
</div>
<x-pagebottom/>