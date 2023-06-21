@extends('layouts/master')
@section('title')
    Funded Projects - Department of Computer Science
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
        <a class="nav-link collapsed" href="{{ url('mou') }}">
            <i class="bi bi-pen-fill"></i>
            <span>MoU</span>
        </a>
    </li>
    @endrole

    @role('Super-Admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('projects') }}">
            <i class="bi bi-currency-dollar"></i>
            <span>Funded Projects</span>
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
          <h1>Funded Projects</h1>
          <div class="">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProjectCreateModal"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add Funded Projects</a>
            <a href="{{ url('reports/projects') }}" class="btn btn-success"><i class="bi bi-file-earmark-pdf-fill"></i> &nbsp;Export to PDF</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">

            <div class="modal fade" id="ProjectUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Funded Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" id="project_edit_form">
                            @method('PUT')
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="researcher" name="researcher" placeholder="name" required>
                                <label for="researcher">Researcher Name</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="role" name="role" placeholder="name" required>
                                <label for="role">Role</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="project" name="project" placeholder="name" required>
                                <label for="project">Project Name</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="funding_agency" name="funding_agency" placeholder="name" required>
                                <label for="funding_agency">Funding Agency</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="status" name="status" placeholder="name" required>
                                <label for="status">Present Status</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="name">
                                <label for="amount">Amount (Optional)</label>
                            </div>    
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Submit</button>                  
                            </div>                                                                     
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ProjectCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Funded Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/projects" id="album_form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="researcher" name="researcher" placeholder="name" required>
                                <label for="researcher">Researcher Name</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="role" name="role" placeholder="name" required>
                                <label for="role">Role</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="project" name="project" placeholder="name" required>
                                <label for="project">Project Name</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="funding_agency" name="funding_agency" placeholder="name" required>
                                <label for="funding_agency">Funding Agency</label>
                            </div>   
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="status" name="status" placeholder="name" required>
                                <label for="status">Present Status</label>
                            </div>    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="name">
                                <label for="amount">Amount (Optional)</label>
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

          @foreach ($fundedProjects as $researcher => $projects)
          <h5 class="pb-2"><strong>{{ $researcher }}</strong></h5>
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                  <div class="col-12" style="overflow-x:auto;">
                      <table class="table align-middle mb-0 bg-white">
                          <thead class="bg-light">
                              <tr>
                                <th>Role</th>
                                <th>Project</th>
                                <th>Funding Agency</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th></th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($projects as $project)
                              <tr>
                                  <td>
                                      <div class="d-flex align-items-center">
                                          <div class="">
                                              <p class="fw-bold mb-1">{{ $project->role }}</p>
                                          </div>
                                      </div>
                                  </td>
                                  <td>
                                      <p class="fw-normal mb-1">{{ $project->project }}</p>
                                  </td>

                                  <td>{{ $project->funding_agency }}</td>
                                  <td>{{ $project->status }}</td>
                                  <td>Rs. {{ $project->amount }}</td>
                                  
                                  <td>
                                      <button type="button" class="btn btn-link btn-sm btn-rounded project-edit-btn" value="{{ $project->funded_project_id }}">
                                      <i class="bi bi-pencil-square h5"></i>
                                      </button>
                                  </td>
                                  <td>
                                      <button type="button" class="btn btn-link btn-sm btn-rounded project-dlt-btn" value="{{ $project->funded_project_id }}">
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
          @endforeach


      </div>
    </div>
  </section>

  

</main>


@endsection