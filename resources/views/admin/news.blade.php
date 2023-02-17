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
                        <form method="POST" action="/events" id="events_create_form" enctype="multipart/form-data">
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

          <div class="col-12">
            <div class="modal fade" id="editEventsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/events" id="events_edit_form" enctype="multipart/form-data">
                            @method('PUT')
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
          @foreach($events as $event)
          <div class="col-lg-4 col-md-6">
            <div class="card" style="width: 22rem;">
              @isset($event->cover_img)
                <img src="{{ Storage::url($event->cover_img) }}" class="card-img-top" alt="...">
              @endisset
              
              @empty($event->cover_img)
                <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="card-img-top" alt="...">
              @endempty
              <div class="card-body">
                <h5 class="card-title">{{ $event->event_title }}</h5>
                <p class="card-text">{{ $event->event_desc }}</p>
                <a href="#" class="btn btn-primary event-edit-btn" id="{{ $event->event_id }}">Edit</a>
                <a href="#" class="btn btn-danger event-dlt-btn" id="{{ $event->event_id }}">Delete</a>
              </div>
            </div>
          </div>
          @endforeach()
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
                      <form method="POST" action="/news" id="news_create_form" enctype="multipart/form-data">
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="news_title" name="news_title" placeholder="Event Title">
                              <label for="news_title">News Title</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="news_desc" rows="10" style="height:100%;" placeholder="Leave a comment here" id="news_desc"></textarea>
                              <label for="news_desc">News Description</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="date" class="form-control" name="news_date" id="news_date">
                              <label for="news_date">News Date</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="file" id="file" class="form-control" name="file" accept=".pdf">
                              <label for="file">File</label>
                          </div>  
                          <button type="submit" class="btn btn-primary">Submit</button>                  
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <div class="col-12">
          <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="/news" id="news_edit_form" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="form-floating mb-3">
                              <input type="name" class="form-control" id="news_title" name="news_title" placeholder="Event Title">
                              <label for="news_title">News Title</label>
                          </div>
                          <div class="form-floating mb-3">
                              <textarea class="form-control" name="news_desc" rows="10" style="height:100%;" placeholder="Leave a comment here" id="news_desc"></textarea>
                              <label for="news_desc">News Description</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="date" class="form-control" name="news_date" id="news_date">
                              <label for="news_date">News Date</label>
                          </div> 
                          <div class="form-floating mb-3">
                              <input type="file" id="file" class="form-control" name="file" accept=".pdf">
                              <label for="file">File</label>
                          </div>  
                          <button type="submit" class="btn btn-primary">Submit</button>                  
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>

        @foreach($news as $new)
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $new->news_title }}</h5>
              <p class="card-text">{{ $new->news_desc }}</p>
              <p class="text-danger"><i class="bi bi-calendar3"></i>  {{ $new->news_date }}</p>
              @isset($new->news_file_path)
              <a href="{{ Storage::url($new->news_file_path) }}" class="btn btn-success" download>Download</a>
              @endisset
              <a href="#" class="btn btn-primary news-edit-btn" id="{{ $new->news_id }}">Edit</a>
              <a href="#" class="btn btn-danger news-dlt-btn" id="{{ $new->news_id }}">Delete</a>
            </div>
          </div>
        </div>
        @endforeach()

      </div>
    </div>
  </section>
</main>
@endsection