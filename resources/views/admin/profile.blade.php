@extends('layouts.master')
  
@section('title')
    Profile - Department of Computer Science
@endsection
    
@section('content')
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ url('profile') }}">
        <i class="bi bi-grid"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('users') }}">
          <i class="bi bi-grid"></i>
          <span>Users</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('courses') }}">
          <i class="bi bi-grid"></i>
          <span>Courses</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('photos') }}">
          <i class="bi bi-grid"></i>
          <span>Photos</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('placement') }}">
          <i class="bi bi-grid"></i>
          <span>Placement</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('news') }}">
          <i class="bi bi-grid"></i>
          <span>News and Events</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('phd') }}">
          <i class="bi bi-grid"></i>
          <span>PhD's</span>
          </a>
      </li>

      <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('phd') }}">
            <i class="bi bi-grid"></i>
            <span>Reports & Log</span>
            </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ url('logout') }}">
          <i class="bi bi-grid"></i>
          <span>Logout</span>
          </a>
      </li>

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
  <div class="d-flex justify-content-between">
    <h1>Personal Information</h1>
    <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
  </div>

</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <div class="col-12 d-lg-flex p-5 justify-content-center align-items-center">
            <div class="col-12 col-lg-3">
              <img src="https://media-exp1.licdn.com/dms/image/C5103AQHB-l8WowFgdQ/profile-displayphoto-shrink_800_800/0/1566454484241?e=2147483647&v=beta&t=Q9S2a0rKiaQVA63Q5WBaORBUB9Mq1AKuoow-UbxjvEY" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="col-12 col-lg-8 ps-lg-5">
              <h1><strong>{{ $user->name }}</strong></h1>
              <h4>{{ $user->designation }}</h4>

              <p class="mt-5 h5 lh-base">
                <i class="bi bi-envelope-fill me-3"></i>{{ $user->email }}
                <br>
                <i class="bi bi-telephone-fill me-3"></i>{{ $user->phone_number }}
              </p>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Other Details</h5>
            <div class="col-12">
                <h6>IQAC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->iqac }}</h6>
                <h6>Portfolio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->portfolio }}</h6>
                <h6>Joined Year:&nbsp;&nbsp;&nbsp;{{ $user->joined_year }}</h6>
                @if(auth()->user()->can('edit profile page'))
                  <h6>edit profile page</h6>
                @endif
            </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center" style="gap: 20px !important;">
        <a href="" class="btn btn-primary">Edit Profile</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Change password
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Old Password</label>
                    <input type="password" name="old_password"class="form-control" id="exampleFormControlInput1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">New Password</label>
                    <input class="form-control" name="new_password" type="password" id="exampleFormControlInput1"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
              </div>
            </div>
          </div>
        </div>            
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection