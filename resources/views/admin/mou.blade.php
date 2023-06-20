@extends('layouts/master')
@section('title')
    Memorandum of Understanding - Department of Computer Science
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
        <a class="nav-link collapsed" href="{{ url('photos') }}">
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
        <a class="nav-link" href="{{ url('mou') }}">
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
    <div class="d-flex justify-content-end">
      <!-- <h1>Photos</h1> -->
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>

  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="pagetitle col-12 d-flex justify-content-between">
          <h1>Memorandum of Understanding</h1>
          <div class="">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MoUCreateModal"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add MoU</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">

            <div class="modal fade" id="MoUUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update MoU</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" id="mou_edit_form" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="title" name="title" placeholder="name" required>
                                <label for="title">MoU Title</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="year" name="year" placeholder="name" required>
                                <label for="year">MoU Year</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <textarea type="name" class="form-control border border-dark" id="description" name="description" placeholder="name" required rows="10" style="height:100%;"></textarea>
                                <label for="description">MoU Description</label>
                            </div>    
                            <div class="mb-3">
                                <label for="logo_img">Logo Image (Optional)</label>
                                <input type="file" name="logo_img" id="logo_img" accept=".jpg,.png,.jpeg">
                            </div>
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                     
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="MoUCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create MoU</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/mou" id="album_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="title" name="title" placeholder="name" required>
                                <label for="title">MoU Title</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="year" name="year" placeholder="name" required>
                                <label for="year">MoU Year</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <textarea type="name" class="form-control border border-dark" id="description" name="description" placeholder="name" rows="10" style="height:100%;"></textarea>
                                <label for="description">MoU Description</label>
                            </div>    
                            <div class="mb-3">
                                <label for="logo_img" class="mb-2">Logo Image (Optional)</label>
                                <input type="file" name="logo_img" id="logo_img" accept=".jpg,.png,.jpeg">
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
    </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="row pt-3">

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

          @foreach ($MoUs as $MoU)
          <div class="col-lg-4 col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                @isset($MoU->logo_img_path)
                  <img src="{{ Storage::url($MoU->logo_img_path) }}" class="img-fluid rounded-start" alt="...">
                @endisset
                @empty($MoU->logo_img_path)
                  <img src="{{ url('images/img/albums/photo-skelton.jpg') }}" class="img-fluid rounded-start" alt="...">
                @endempty

                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $MoU->title }}</h5>
                    <p class="card-text">{{ $MoU->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ $MoU->year }}</small></p>
                    <a class="btn btn-primary mou-edit-btn" value="{{  $MoU->mou_id }}" href="#">Edit</a>
                    <a class="btn btn-danger mou-dlt-btn" value="{{  $MoU->mou_id }}" href="#">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </section>

  

</main>


@endsection