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
                            <li><a class="dropdown-item" href="#">I.MSc</a></li>
                            <li><a class="dropdown-item" href="#">M.Tech</a></li>
                            <li><a class="dropdown-item" href="#">PhD</a></li>
                        </ul>
                    </div>
                    <div class="">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPlacementModal">Add New Placement</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                <div class="modal fade" id="createPlacementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Timetable</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/placement" method="post" id="create_placement_form" >
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="student_name" id="floatingInput" placeholder="name@example.com">
                                    <label for="student_name">Student Name</label>
                                </div>
                                <div class="mb-3">
                                    <label for="courseName">Course Name</label>
                                    <select class="form-select" name="course_id" aria-label="Default select example" placeholder="Select the Course Name">
                                        @foreach ($courses as $course)
                                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="batch" id="floatingInput" placeholder="name@example.com">
                                    <label for="batch">Batch</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="company" id="floatingInput" placeholder="name@example.com">
                                    <label for="company">Company</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="job_role" id="floatingInput" placeholder="name@example.com">
                                    <label for="job_role">Job Role</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>


                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="col-12" style="overflow-x:auto;">
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Batch</th>
                                <th>Company</th>
                                <th>Job Role</th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($placements as $placement)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="fw-bold mb-1">{{ $placement->student_name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $placement->getCourse->course_name }}</p>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-secondary rounded-pill d-inline">{{ $placement->batch }}</span>
                                    </td>
                                    <td>{{ $placement->company }}</td>
                                    <td>{{ $placement->job_role }}</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded" value="{{ $placement->placement_id }}">
                                        <i class="bi bi-pencil-square h5"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded" value="{{ $placement->placement_id }}">
                                        <i class="bi bi-trash3-fill h5 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach()
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