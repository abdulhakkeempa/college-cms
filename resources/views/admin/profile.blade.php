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

      <div class="col-12">
          @if(session()->has('message'))
              <div class="alert alert-success text-black">
                  {{ session()->get('message') }}
              </div>
          @endif
      </div>

      @if($errors->any())
      <div class="alert alert-danger text-black">
         {{$errors->first()}}
      </div>
      @endif

      <div class="card">
        <div class="card-body">

          <div class="col-12 d-lg-flex p-5 justify-content-center align-items-center">
            <div class="col-12 col-lg-3">
              <img src="{{ Storage::url($user->profile_picture) }}" class="img-fluid rounded-circle" alt="">
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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Edit Profile
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" id="user_update_form" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="user_name_prefill" name="user_name" placeholder="Name" value="{{ $user->name }}">
                        <label for="user_name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="designation" name="designation" placeholder="name@example.com" value="{{ $user->designation }}">
                        <label for="designation">Designation</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="user_email_prefill" name="user_email" placeholder="name@example.com" value=" {{ $user->email }} ">
                        <label for="user_email">Email address</label>
                    </div> 
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone_number_prefill" name="phone_number" placeholder="Password" value=" {{$user->phone_number}}">
                        <label for="phone_number">Phone Number</label>
                    </div>                                                                         
                    <div class="form-floating mb-3">
                        <input type="url" class="form-control" id="iqac_prefil" name="iqac" placeholder="name@example.com" value="{{ $user->iqac }} ">
                        <label for="iqac">IQAC</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="url" class="form-control" id="portfolio_prefill" name="portfolio" placeholder="Password" value=" {{ $user->portfolio }} ">
                        <label for="portfolio">Portfolio</label>
                    </div>  
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="address" rows="4" style="height:100%;" placeholder="Leave a comment here" id="address_prefill" >{{ $user->address }} </textarea>
                        <label for="address">Address</label>  
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="joined_year" id="joined_year_prefill" placeholder="Password" value="{{ $user->joined_year }}">
                        <label for="joined_year">Joined Year</label>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept=".jpg,.png,.jpeg">
                    </div>  
                    <button type="submit" class="btn btn-primary">Submit</button>                  
                </form>       
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

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
                <form method="POST" action="/profile">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Old Password</label>
                    <input type="password" name="old_password"class="form-control" id="exampleFormControlInput1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">New Password</label>
                    <input class="form-control" name="new_password" type="password" id="exampleFormControlInput2"></textarea>
                  </div>
                  <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit">
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