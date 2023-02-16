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

            <div class="modal fade" id="albumUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" id="album_edit_form">
                            @method('PUT')
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
                    <form method="POST" action="/photos/album/" id="photo_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="album_id" name="album_id" hidden>
                        </div>   
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <label for="images">Images</label>
                        </div>                                                                       
                        <button type="submit" class="btn btn-primary">Submit</button>                  
                    </form>
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

          @foreach ($albums as $album)
            <div class="col-lg-4 col-md-6">
              <div class="card" style="width: 22rem;">

                @isset($album->coverPhoto->getPhoto->photo_file_path)
                  <img src="{{ Storage::url($album->coverPhoto->getPhoto->photo_file_path) }}" class="card-img-top" alt="...">
                @endisset
                
                @empty($album->coverPhoto->getPhoto->photo_file_path)
                  <img src="{{ url('images/img/albums/photo-skelton.jpg') }}" class="card-img-top" alt="...">
                @endempty

                <div class="card-body">
                  <h5 class="card-title">{{$album->album_title}}</h5>
                  <button class="btn btn-primary photos-album-btn" value="{{ $album->album_id }}">Add Photos</button>
                  <a href="{{ url('/photos/album', [ $album->album_id ]) }}" class="btn btn-success">View Photos</a>
                  <button href="#" class="btn btn-success album-edit-btn" id="{{ $album->album_id }}">Edit</button>
                  <button href="#" class="btn btn-danger album-dlt-btn" id="{{ $album->album_id }}">Delete</button>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    </div>
  </section>

  

</main>


@endsection