@extends('layouts/master')
@section('title')
    Photos - Department of Computer Science
@endsection


@section('content')
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('profile') }}">
      <i class="bi bi-person-circle"></i>
      <span>Profile</span>
      </a>
    </li><!-- End Dashboard Nav -->

    @role('Super-Admin')
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('users') }}">
      <i class="bi bi-people"></i>
      <span>Users</span>
      </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('courses') }}">
            <i class="bi bi-journals"></i>
            <span>Courses</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('photos') }}">
            <i class="bi bi-images"></i>
            <span>Photos</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('placement') }}">
            <i class="bi bi-award"></i>
            <span>Placement and Awards</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('news') }}">
            <i class="bi bi-newspaper"></i>
            <span>News and Events</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('phd') }}">
            <i class="bi bi-mortarboard"></i>
            <span>PhD's</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('phd') }}">
            <i class="bi bi-journal-check"></i>
            <span>Reports & Log</span>
        </a>
    </li>
    @endrole

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('logout') }}">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>Albums / {{ $album->album_title }}</h1>
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>

  </div>


  <section class="section">
    <div class="container">
      <div class="row">

          <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
            @endif
          </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container-fluid">
      <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-3 image-container">
          <img src="{{ Storage::url($photo->photo_file_path) }}" class="img-fluid">
          <div class="image-text">
            <a href="#" id="{{ $photo->photo_id }}"  class="btn btn-primary photo-dlt-btn">Delete</a>
            <button class="btn btn-success set-album-cover-btn" data-photo-id="{{ $photo->photo_id }}" data-album-id="{{ $album->album_id }}">Set as Album Cover</button>
          </div>
        </div>
        @endforeach

        <div class="col-md-3 image-container">
          <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="img-fluid">
            <div class="image-text">
              <button class="btn btn-primary">Delete</button>
            </div>
        </div>
      </div>
    </div>
  </section>
  

</main>


@endsection