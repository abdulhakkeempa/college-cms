@extends('layouts/master')

@section('title')
  News and Events - Department of Computer Science
@endsection


@section('content')

<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('profile') }}">
        <i class="bi bi-grid"></i>
        <span>Profile</span>
        </a>
    </li>

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
        <span>Placements & Awards</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('news') }}">
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

</aside>

<main class="main" id="main">
  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>Events</h1>
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Lorem Ipsum</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Fest Eve 2022</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Onam 2022</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>              
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>



  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>News</h1>
  </div>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">News Title</h5>
              <p class="card-text">News Description</p>
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">News Title</h5>
              <p class="card-text">News Description</p>
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection