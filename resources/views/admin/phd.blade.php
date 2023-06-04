@extends('layouts/master')

@section('title')
  PhD's - Department of Computer Science
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
        <a class="nav-link " href="{{ url('phd') }}">
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

<main class="main" id="main">
  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>PhD's</h1>
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
                      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#phdModal">Add PhD</a>
                  </div>
              </div>
          </div>
      </div>
  </section>



  <section class="section">
    <div class="container">
      <div class="row">
        
          <div class="col-12">
            <div class="modal fade" id="phdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Phd</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/phd" id="phd_form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="scholar_name" name="scholar_name" placeholder="name" required>
                                <label for="scholar_name">Scholar Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control border border-dark" name="title" rows="2" style="height:100%;" placeholder="Leave a comment here" id="title" required></textarea>
                                <label for="title">Thesis Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="guide" name="guide" placeholder="name@example.com" required>
                                <label for="guide">Guide</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="awarded_date" name="awarded_date" placeholder="Password" required>
                                <label for="awarded_date">Awarded Date</label>
                            </div>    
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                     
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="phdEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Phd</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/phd" id="phd_edit_form">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="scholar_name" name="scholar_name" placeholder="name" required>
                                <label for="scholar_name">Scholar Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control border border-dark" name="title" rows="2" style="height:100%;" placeholder="Leave a comment here" id="title" required></textarea>
                                <label for="title">Thesis Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="guide" name="guide" placeholder="name@example.com" required>
                                <label for="guide">Guide</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="awarded_date" name="awarded_date" placeholder="Password" required>
                                <label for="awarded_date">Awarded Date</label>
                            </div>       
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                  
                        </form>
                    </div>
                    </div>
                </div>
            </div>
           
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

          <div class="card">
              <div class="card-body">
              <div class="col-12" style="overflow-x:auto;">
                  <table class="table align-middle mb-0 bg-white">
                      <thead class="bg-light">
                          <tr>
                          <th span="1" style="width: 20%;" >Name</th>
                          <th span="1" style="width: 40%;">Title</th>
                          <th>Guide</th>
                          <th>Awarded on</th>
                          <th></th>
                          <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($phds as $phd)
                          <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="fw-bold mb-1">{{ $phd->scholar_name }}</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">
                                  {{ $phd->title }}

                                </p>
                            </td>
                            <td>
                                <span class="badge text-bg-secondary rounded-pill d-inline">{{ $phd->guide }}</span>
                            </td>
                            <td>{{ $phd->awarded_date }}</td>
                            <td>
                                <button type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="bi bi-pencil-square h5 phd-edit-btn" value="{{ $phd->phd_id }}"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="bi bi-trash3-fill h5 text-danger phd-dlt-btn" value="{{ $phd->phd_id }}"></i>
                                </button>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              </div>
          </div>

          </div>


      </div>
    </div>
  </section>
</main>

@endsection