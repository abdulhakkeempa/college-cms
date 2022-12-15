@extends('layouts/master')

@section('title')
    Placements - Department of Computer Science
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
        <a class="nav-link" href="{{ url('placement') }}">
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
            <h1>Placement</h1>
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
                <li><a class="dropdown-item" href="#">M.Tech</a></li>
                <li><a class="dropdown-item" href="#">I.MSc</a></li>
            </ul>
          </div>
          <div class="">
            <a href="" class="btn btn-primary">Add New Placement</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12" style="overflow-x:auto;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Batch</th>
                <th scope="col">Company</th>
                <th scope="col">Job Role</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Abdul Hakkeem P A</td>
                <td>M.Tech</td>
                <td>2022-24</td>
                <td>U.S.T Global</td>
                <td>ML Engineer</td>
              </tr>
              <tr>
              <th scope="row">2</th>
                <td>Abhishek Mohan</td>
                <td>I.MSc</td>
                <td>2022-27</td>
                <td>Wipro</td>
                <td>Data Engineer</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection