@extends('layouts/master')
@section('title')
    Courses - Department of Computer Science
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
    <a class="nav-link" href="{{ url('courses') }}">
      <i class="bi bi-grid"></i>
      <span>Courses</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>Courses</h1>
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>

  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex">
          <div class="input-group mb-3">
            <input type="text" class="form-control" aria-label="Text input with dropdown button">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All</button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">System Admin</a></li>
                <li><a class="dropdown-item" href="#">Teachers</a></li>
                <li><a class="dropdown-item" href="#">Office Staff</a></li>
            </ul>
          </div>
          <div class="">
            <a href="" class="btn btn-primary">Create New User</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


@endsection