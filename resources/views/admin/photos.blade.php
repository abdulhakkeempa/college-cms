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
        <a class="nav-link collapsed" href="{{ url('mou') }}">
            <i class="bi bi-pen-fill"></i>
            <span>MoU</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('projects') }}">
            <i class="bi bi-currency-dollar"></i>
            <span>Funded Projects</span>
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
    <div class="d-flex justify-content-end">
      <!-- <h1>Photos</h1> -->
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>

  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="pagetitle col-12 d-flex justify-content-between">
          <h1>Photos</h1>
          <div class="">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#albumModal"><i class="bi bi-plus-circle-fill"></i> &nbsp;Create Album</a>
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
                                <input type="name" class="form-control" id="album_title" name="album_title" placeholder="name" required>
                                <label for="album_title">Album Name</label>
                            </div>  
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                     
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="albumModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/photos" id="album_form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="album_title" name="album_title" placeholder="name" required>
                                <label for="album_title">Album Name</label>
                            </div>     
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                  
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="photosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/photos/album/" id="photo_form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating">
                            <input type="number" class="form-control" id="album_id" name="album_id" hidden>
                        </div>   
                        <div class="mb-3">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" accept=".jpg,.png,.jpeg" multiple required>
                        </div>    
                        <div class="d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Submit</button>                  
                        </div>                                                                   
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
                  <div class="alert alert-danger alert-dismissible fade show">
                      <ul class="text-black">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
          </div>

          <div class="col-12">
              @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show text-black" >
                      {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
          </div>

          <div class="col-12">
              <div class="alert alert-success alert-dismissible fade show text-black d-none" id="success-box">

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>      
          
          <div class="col-12">
              <div class="alert alert-danger alert-dismissible fade show text-black d-none" id="error-box">

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
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
                  <a href="#" class="btn btn-primary photos-album-btn" value="{{ $album->album_id }}"><i class="bi bi-file-earmark-plus-fill"></i></a>
                  <a href="#" class="btn btn-warning album-edit-btn" id="{{ $album->album_id }}"><i class="bi bi-pencil-square"></i></a>
                  <a href="{{ url('/photos/album', [ $album->album_id ]) }}" class="btn btn-success"><i class="bi bi-images"></i></a>
                  <a href="#" class="btn btn-danger album-dlt-btn" id="{{ $album->album_id }}"><i class="bi bi-trash3"></i></a>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    </div>
  </section>

  

</main>


@endsection