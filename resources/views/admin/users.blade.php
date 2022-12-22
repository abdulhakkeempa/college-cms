@extends('layouts/master')

@section('title')
    Users - Department of Computer Science
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
      <a class="nav-link" href="{{ url('users') }}">
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
    <h1>Users</h1>
    <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
  </div>

</div><!-- End Page Title -->

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
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New User</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section">
  <div class="container">
    <div class="row">
        <div class="col-12">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/profile">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Designation</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingInput">Phone Number</label>
                            </div>                                                                         
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">IQAC</label>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Teacher">
                                    <label class="form-check-label" for="inlineRadio1">Teacher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Office Staff">
                                    <label class="form-check-label" for="inlineRadio2">Office Staff</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Admin">
                                    <label class="form-check-label" for="inlineRadio3">Admin</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingInput">Portfolio</label>
                            </div>  
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Address</label>  
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingInput">Joined Year</label>
                            </div>                                              
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

        <div class="card">
            <div class="card-body">
            <div class="col-12" style="overflow-x:auto;">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Account Type</th>
                        <th>Joined Year</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">John Doe</p>
                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Assistant Professor</p>
                        </td>
                        <td>
                            <span class="badge text-bg-secondary rounded-pill d-inline">Teacher</span>
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
                        <tr>
                        <td>
                            <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                                />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Alex Ray</p>
                                <p class="text-muted mb-0">alex.ray@gmail.com</p>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Section Officer</p>
                        </td>
                        <td>
                            <span class="badge text-bg-success rounded-pill d-inline"
                                >Office Staff</span
                            >
                        </td>
                        <td>Junior</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold"
                                    data-mdb-ripple-color="dark"
                                    >
                            Edit
                            </button>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                                />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Kate Hunington</p>
                                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Designer</p>
                            <p class="text-muted mb-0">UI/UX</p>
                        </td>
                        <td>
                            <span class="badge text-bg-danger rounded-pill d-inline">Admin</span>
                        </td>
                        <td>Senior</td>
                        <td>
                            <button
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold"
                                    data-mdb-ripple-color="dark"
                                    >
                            Edit
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

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection