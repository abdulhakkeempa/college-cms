@extends('layouts/master')

@section('title')
    Placements - Department of Computer Science
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
        <a class="nav-link" href="{{ url('placement') }}">
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
        <div class="d-flex justify-content-end">
            <!-- <h1>Placement</h1> -->
            <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 pagetitle d-flex justify-content-between pb-3">
                    <h1>Placement</h1>
                    <div class="">
                        <button href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPlacementModal"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add  Placement</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show text-black d-none" id="placement-success-box">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>      
                
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show text-black d-none" id="placement-error-box">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div> 

                <div class="col-12">
                    @if(session()->has('placement-message'))
                        <div class="alert alert-success alert-dismissible fade show text-black" >
                            {{ session()->get('placement-message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    @if ($errors->hasAny(['placement_student_name', 'placement_course_id','placement_batch','placement_company','placement_job_role']))
                        <div class="alert alert-danger alert-dismissible fade show text-black">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <div class="modal fade" id="createPlacementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Placement</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/placement" method="post" id="create_placement_form" >
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_student_name" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="placement_student_name">Student Name</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseName">Course Name</label>
                                        <select class="form-select" name="placement_course_id" aria-label="Default select example" placeholder="Select the Course Name" required>
                                            @foreach ($courses as $course)
                                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_batch" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="placement_batch">Batch</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_company" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="placement_company">Company</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_job_role" id="floatingInput" placeholder="name@example.com">
                                        <label for="placement_job_role">Job Role</label>
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

                <div class="col-12">
                    <div class="modal fade" id="editPlacementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Placement</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/placement" method="post" id="edit_placement_form" >
                                    @method('put')
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_student_name" id="floatingInput" placeholder="name@example.com">
                                        <label for="placement_student_name">Student Name</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseName">Course Name</label>
                                        <select class="form-select" name="placement_course_id" aria-label="Default select example" placeholder="Select the Course Name">
                                            @foreach ($courses as $course)
                                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_batch" id="floatingInput" placeholder="name@example.com">
                                        <label for="placement_batch">Batch</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_company" id="floatingInput" placeholder="name@example.com">
                                        <label for="placement_company">Company</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="placement_job_role" id="floatingInput" placeholder="name@example.com">
                                        <label for="placement_job_role">Job Role</label>
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
                                            <button type="button" class="btn btn-link btn-sm btn-rounded placement-edit-btn" value="{{ $placement->placement_id }}">
                                            <i class="bi bi-pencil-square h5"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-sm btn-rounded placement-dlt-btn" value="{{ $placement->placement_id }}">
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
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 pagetitle d-flex justify-content-between pb-3">
                    <h1>Awards</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAwardModal"><i class="bi bi-plus-circle-fill"></i> &nbsp; Create Awards</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show text-black d-none" id="awards-success-box">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>      
                
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show text-black d-none" id="awards-error-box">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
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
                @if ($errors->hasAny(['student_name', 'course_id','batch']))
                <div class="alert alert-danger text-black alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                </div>

                <div class="col-12">
                    <div class="modal fade" id="createAwardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Awards</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/awards" method="post" id="create_award_form" >
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="student_name" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="student_name">Student Name</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="courseName">Course Name</label>
                                            <select class="form-select" name="course_id" aria-label="Default select example" placeholder="Select the Course Name" required>
                                                @foreach ($courses as $course)
                                                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="batch" id="floatingInput" placeholder="name@example.com" required>
                                            <label for="batch">Batch</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="award_desc" id="floatingInput" placeholder="name@example.com">
                                            <label for="award_desc">Award Description</label>
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

                <div class="col-12">
                    <div class="modal fade" id="editAwardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Awards</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/placement" method="post" id="edit_award_form" >
                                    @method('put')
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="student_name" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="student_name">Student Name</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseName">Course Name</label>
                                        <select class="form-select" name="course_id" aria-label="Default select example" placeholder="Select the Course Name" required>
                                            @foreach ($courses as $course)
                                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="batch" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="batch">Batch</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="award_desc" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="award_desc">Award Description</label>
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
                                <th>Award</th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($awards as $award)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="fw-bold mb-1">{{ $award->student_name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $award->getCourse->course_name }}</p>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-secondary rounded-pill d-inline">{{ $award->batch }}</span>
                                    </td>
                                    <td>{{ $award->award_desc }}</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded award-edit-btn" value="{{ $award->award_id }}">
                                        <i class="bi bi-pencil-square h5"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded award-dlt-btn" value="{{ $award->award_id }}">
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