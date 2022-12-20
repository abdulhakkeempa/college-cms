@extends('layouts/master')

@section('title')
  PhD's - Department of Computer Science
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
        <a class="nav-link" href="{{ url('phd') }}">
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
                      <a href="" class="btn btn-primary">Add New PhD</a>
                  </div>
              </div>
          </div>
      </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-body">
              <div class="col-12" style="overflow-x:auto;">
                  <table class="table align-middle mb-0 bg-white">
                      <thead class="bg-light">
                          <tr>
                          <th col="75" >Name</th>
                          <th>Title</th>
                          <th>Guide</th>
                          <th>Awarded on</th>
                          <th></th>
                          <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td>
                              <div class="d-flex align-items-center">
                              <div class="">
                                  <p class="fw-bold mb-1">John Doe</p>
                              </div>
                              </div>
                          </td>
                          <td>
                              <p class="fw-normal mb-1">
                                Deep Learning Based Computational Framework For Highspeed Automatic Ship Identification From Synthetic Aperture Radar Image

                              </p>
                          </td>
                          <td>
                              <span class="badge text-bg-secondary rounded-pill d-inline">Dr Sumam Mary Idicula</span>
                          </td>
                          <td>24/10/2022</td>
                          <td>
                              <button type="button" class="btn btn-link btn-sm btn-rounded">
                              <i class="bi bi-pencil-square h5"></i>
                              </button>
                          </td>
                          <td>
                              <button type="button" class="btn btn-link btn-sm btn-rounded">
                              <i class="bi bi-trash3-fill h5 text-danger"></i>
                              </button>
                          </td>
                          </tr>
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