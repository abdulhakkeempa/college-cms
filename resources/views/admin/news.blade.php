@extends('layouts/master')

@section('title')
  News and Events - Department of Computer Science
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
        <span>Placements & Awards</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('news') }}">
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
      <h1>Events</h1>
      <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEventsModal">Create Events</button>
        <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
      </div>
    </div>
  </div>

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

          <div class="col-12">
            <div class="modal fade" id="createEventsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/courses" id="course_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="event_title" name="event_title" placeholder="Event Title">
                                <label for="event_title">Event Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="event_desc" rows="10" style="height:100%;" placeholder="Leave a comment here" id="event_desc"></textarea>
                                <label for="event_desc">Event Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="event_date" id="event_date">
                                <label for="event_date">Event Date</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="file" id="cover_img" class="form-control" name="cover_img" accept=".png,.jpg,.jpeg">
                                <label for="cover_img">Cover Image</label>
                            </div>  
                            <button type="submit" class="btn btn-primary">Submit</button>                  
                        </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Lorem Ipsum</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Fest Eve 2022</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Onam 2022</h5>
                <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>              
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>



  <div class="pagetitle">
    <div class="d-flex justify-content-between">
      <h1>News</h1>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewsModal">Create News</button>
  </div>

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

        <div class="col-12">
          <div class="modal fade" id="createNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">News Title</h5>
              <p class="card-text">News Description</p>
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">News Title</h5>
              <p class="card-text">News Description</p>
              <a href="#" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection