@extends('layouts/master')
@section('title')
    Courses - Department of Computer Science
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
        <a class="nav-link" href="{{ url('courses') }}">
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
      <!-- <h1>Courses</h1> -->
      <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
    </div>

  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="pagetitle col-12 d-flex justify-content-between pb-3">
          <h1>Courses</h1>
          <div class="">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCourseModal"><i class="bi bi-plus-circle-fill"></i> &nbsp; Add Course</a>
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#programStructureModal"><i class="bi bi-plus-circle-fill"></i> &nbsp; Add Program Structure</a>
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#timetableModal"><i class="bi bi-plus-circle-fill"></i> &nbsp; Add Timetable</a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="section">
    <div class="container">
      <div class="row">

        <div class="col-12">
          <div class="modal fade" id="programStructureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Program Structure</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/courses/ps" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="courseName">Course Name</label>
                      <select class="form-select" name="course_id" aria-label="Default select example" placeholder="Select the Course Name" required>
                        @foreach ($courses as $course)
                          <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" name="program_structure_year" placeholder="name@example.com" required>
                      <label for="floatingInput">Program Structure Year</label>
                    </div>
                    <div class="mb-3">
                      <label for="program_structure_file">Program Structure File</label>
                      <input type="file" class="form-control" id="floatingPassword" name="program_structure_file" required>
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
          <div class="modal fade" id="timetableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Timetable</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/courses/tb" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="courseName">Course Name</label>
                      <select class="form-select" name="course_id" aria-label="Default select example" placeholder="Select the Course Name" required>
                        @foreach ($courses as $course)
                          <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="semester" id="floatingInput" placeholder="name@example.com" required>
                      <label for="semester">Semester</label>
                    </div>
                    <div class="mb-3">
                      <label for="timetable_file">Timetable File</label>
                      <input type="file" name="timetable_file" class="form-control" id="floatingPassword" placeholder="Password" required>
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
          <div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Create Course</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="/courses" id="course_form" enctype="multipart/form-data">
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required>
                              <label for="course_name">Course Name</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control border border-dark" name="eligibility" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address" required></textarea>
                              <label for="eligibility">Eligibility</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control border border-dark" name="course_description" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address" required></textarea>
                              <label for="course_description">Course Description</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="fees" name="fees" placeholder="Password" required>
                              <label for="fees">Fees</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="number" name="year_started" class="form-control" min="1900" max="2099" step="1"  required placeholder="2012">
                              <label for="year_started">Year Started</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="duration" name="duration" placeholder="Password" required>
                              <label for="duration">Duration</label>
                          </div>
                          <div class="mb-3">
                              <label for="cover_img">Cover Image</label>
                              <input type="file" id="cover_img"  name="cover_image" class="form-control" accept=".png,.jpg,.jpeg" required>
                          </div>    
                          <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>                  
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
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
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Course</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="/courses" id="courseEditForm" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required>
                              <label for="course_name">Course Name</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control border border-dark" name="eligibility" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address" required></textarea>
                              <label for="eligibility">Eligibility</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control border border-dark" name="course_description" rows="10" style="height:100%;" placeholder="Leave a comment here" id="address" required></textarea>
                              <label for="course_description">Course Description</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="fees" name="fees" placeholder="Password" required>
                              <label for="fees">Fees</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="year_started" name="year_started" placeholder="name@example.com" required>
                              <label for="year_started">Year Started</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="duration" name="duration" placeholder="Password" required>
                              <label for="duration">Duration</label>
                          </div>
                          <div class="mb-3">
                              <label for="cover_img">Duration</label>
                              <input type="file" id="cover_img" class="form-control" name="cover_image" accept=".png,.jpg,.jpeg" required>
                          </div>   
                          <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>                  
                          </div> 
                      </form>
                  </div>
                  <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" type="submit">Save changes</button> -->
                  </div>
                </div>
              </div>
          </div>
        </div>

        <div class="col-12">
          <div class="modal fade" id="course_detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel"><strong><span id="course-span"></span></strong></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6 class="fs-5 pb-3">Program Structure</h6>
                  <div>
                    <div class="col-12" id="ps">
                      <div class="col-6">
                        <div class="card" style="width: 13rem;">
                          <div class="card-body d-flex justify-content-center align-items-center">
                            <p>2018
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-file-pdf h4 text-success" value=""></i>
                              </button>
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-trash3-fill h4 text-danger" value=""></i>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
               
                  </div>
                  <h6 class="fs-5 pb-3">Timetable</h6>
                  <div>
                    <div class="col-12" id="tb">
                      <div class="col-6">
                        <div class="card" style="width: 13rem;">
                          <div class="card-body d-flex justify-content-center align-items-center">
                            <p>2018
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-file-pdf h4 text-success" value=""></i>
                              </button>
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block timetable-dlt-btn">
                                <i class="bi bi-trash3-fill h4 text-danger" value=""></i>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card" style="width: 13rem;">
                          <div class="card-body d-flex justify-content-center align-items-center">
                            <p>2018
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-file-pdf h4 text-success" value=""></i>
                              </button>
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-trash3-fill h4 text-danger" value=""></i>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card" style="width: 13rem;">
                          <div class="card-body d-flex justify-content-center align-items-center">
                            <p>2018
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-file-pdf h4 text-success" value=""></i>
                              </button>
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-trash3-fill h4 text-danger" value=""></i>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card" style="width: 13rem;">
                          <div class="card-body d-flex justify-content-center align-items-center">
                            <p>2018
                              <a href="cusat.ac.in" class="btn">
                                <i class="bi bi-file-pdf h4 text-success" value=""></i>
                              </a>
                              <button type="button" class="btn btn-link btn-sm btn-rounded inline-block">
                                <i class="bi bi-trash3-fill h4 text-danger" value=""></i>
                              </button>
                            </p>
                          </div>
                        </div>
                      </div>                           
                    </div>                    
                  </div>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div> -->
              </div>
            </div>
          </div>
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

        <div class="col-12">
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show text-black">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-black" >{{ $error }}</li>
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

        @foreach ($courses as $course)
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="{{ Storage::url($course->cover_img_path)  }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $course->course_name }}</h5>
                <a href="#" class="btn btn-secondary course-view-btn" id="{{ $course->course_id }}" value="{{ $course->course_name }}"><i class="bi bi-file-text"></i></a>
                <a href="#" class="btn btn-primary course-edit-btn"  id="{{ $course->course_id }}">Edit</a>
                <a href="#" class="btn btn-danger course-dlt-btn" id="{{ $course->course_id }}">Delete</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  

</main>

<script>
    var storage_folder = "{{ asset('storage') }}";
</script>

@endsection