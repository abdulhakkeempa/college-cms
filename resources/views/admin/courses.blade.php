@extends('layouts/master')
@section('title')
    Courses - Department of Computer Science
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
      <a class="nav-link" href="{{ url('courses') }}">
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
      <h1>Courses</h1>
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
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCourseModal">Create New Course</a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="/courses" id="course_form" enctype="multipart/form-data">
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
                              <label for="course_name">Course Name</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="eligibility" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address"></textarea>
                              <label for="eligibility">Eligibility</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="course_description" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address"></textarea>
                              <label for="course_description">Course Description</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="fees" name="fees" placeholder="Password">
                              <label for="fees">Fees</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="year_started" name="year_started" placeholder="name@example.com">
                              <label for="year_started">Year Started</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="duration" name="duration" placeholder="Password">
                              <label for="duration">Duration</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="file" id="cover_img" name="cover_image" accept=".png,.jpg,.jpeg">
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

        <div class="col-12">
          <div class="modal fade" id="courseEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="/courses" id="courseEditForm" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="course_name" name="course_name" placeholder="Course Name">
                              <label for="course_name">Course Name</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="eligibility" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address"></textarea>
                              <label for="eligibility">Eligibility</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="course_description" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address"></textarea>
                              <label for="course_description">Course Description</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="fees" name="fees" placeholder="Password">
                              <label for="fees">Fees</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="year_started" name="year_started" placeholder="name@example.com">
                              <label for="year_started">Year Started</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="duration" name="duration" placeholder="Password">
                              <label for="duration">Duration</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="file" id="cover_img" name="cover_image" accept=".png,.jpg,.jpeg">
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

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


        @foreach ($courses as $course)
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="{{ url('images/courses/' . $course->cover_img_path )  }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $course->course_name }}</h5>
                <a href="#" class="btn btn-primary course-edit-btn"  id="{{ $course->course_id }}">Edit</a>
                <a href="#" class="btn btn-danger course-dlt-btn" id="{{ $course->course_id }}">Delete</a>
              </div>
            </div>
          </div>
        @endforeach




          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://media.istockphoto.com/id/1206796363/photo/ai-machine-learning-hands-of-robot-and-human-touching-on-big-data-network-connection.jpg?s=612x612&w=0&k=20&c=xIX5Bz7h50B83cCZG_gXkyZSOu-mG93DtOcNK7RNEAo=" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">M.Tech Computer Science & Engineering (Data Science and Artificial Intelligence)[Part-Time]</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://media.istockphoto.com/id/1206796363/photo/ai-machine-learning-hands-of-robot-and-human-touching-on-big-data-network-connection.jpg?s=612x612&w=0&k=20&c=xIX5Bz7h50B83cCZG_gXkyZSOu-mG93DtOcNK7RNEAo=" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">M.Sc. (Five Year Integrated) in Computer Science (Artificial Intelligence & Data Science)</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://media.istockphoto.com/id/1206796363/photo/ai-machine-learning-hands-of-robot-and-human-touching-on-big-data-network-connection.jpg?s=612x612&w=0&k=20&c=xIX5Bz7h50B83cCZG_gXkyZSOu-mG93DtOcNK7RNEAo=" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">M Tech Computer Science & Engineering with specialization in Data Science & Artificial Intelligence (AICTE - Approved)</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger" >Delete</a>              
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>

  

</main>


@endsection