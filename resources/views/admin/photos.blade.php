@extends('layouts/master')
@section('title')
    Photos - Department of Computer Science
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
      <a class="nav-link" href="{{ url('photos') }}">
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
      <h1>Photos</h1>
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
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#albumModal">Create New Album</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
            <div class="modal fade" id="albumModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/photos" id="album_form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="album_title" name="album_title" placeholder="name">
                                <label for="album_title">Album Name</label>
                            </div>                                                                       
                            <button type="submit" class="btn btn-primary">Submit</button>                  
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="photosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Album</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/photos/albums" id="photo_form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="images" name="images" multiple>
                            <label for="images">Images</label>
                        </div>                                                                       
                        <button type="submit" class="btn btn-primary">Submit</button>                  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="row">

          @foreach ($albums as $album)
            <div class="col-lg-4 col-md-6">
              <div class="card" style="width: 22rem;">
                <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$album->album_title}}</h5>
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#photosModal">Add Photos</a>
                  <a href="#" class="btn btn-success">Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                </div>
              </div>
            </div>
          @endforeach

          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Lorem Ipsum</h5>
                <a href="#" class="btn btn-primary">Add Photos</a>
                <a href="#" class="btn btn-success">Edit</a>
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

  

</main>


@endsection