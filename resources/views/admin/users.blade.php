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

            <div class="modal fade" id="jsonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="user_update_form">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="user_name_prefill" name="user_name" placeholder="">
                                <label for="user_name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="designation" name="designation" placeholder="name@example.com">
                                <label for="designation">Designation</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="user_email_prefill" name="user_email" placeholder="name@example.com">
                                <label for="user_email">Email address</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phone_number_prefill" name="phone_number" placeholder="Password">
                                <label for="phone_number">Phone Number</label>
                            </div>                                                                         
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="iqac_prefil" name="iqac" placeholder="name@example.com">
                                <label for="iqac">IQAC</label>
                            </div>
                            <!-- <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio1" value="Teacher">
                                    <label class="form-check-label" for="inlineRadio1">Teacher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio2" value="Office Staff">
                                    <label class="form-check-label" for="inlineRadio2">Office Staff</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio3" value="Admin">
                                    <label class="form-check-label" for="inlineRadio3">Admin</label>
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="portfolio_prefill" name="portfolio" placeholder="Password">
                                <label for="portfolio">Portfolio</label>
                            </div>  
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="address" rows="4" style="height:100%;" placeholder="Leave a comment here" id="address_prefill"></textarea>
                                <label for="address">Address</label>  
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="joined_year" id="joined_year_prefill" placeholder="Password">
                                <label for="joined_year">Joined Year</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>                  
                        </form>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/users" id="user_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="user_name" name="user_name" placeholder="Name">
                                <label for="user_name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="designation" name="designation" placeholder="name@example.com">
                                <label for="designation">Designation</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com">
                                <label for="user_email">Email address</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Password">
                                <label for="phone_number">Phone Number</label>
                            </div>                                                                         
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="iqac" name="iqac" placeholder="name@example.com">
                                <label for="iqac">IQAC</label>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio1" value="Teacher">
                                    <label class="form-check-label" for="inlineRadio1">Teacher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio2" value="Office Staff">
                                    <label class="form-check-label" for="inlineRadio2">Office Staff</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="account_type" id="inlineRadio3" value="Admin">
                                    <label class="form-check-label" for="inlineRadio3">Admin</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="portfolio" name="portfolio" placeholder="Password">
                                <label for="portfolio">Portfolio</label>
                            </div>  
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="address" rows="4" style="height:100%;" placeholder="Leave a comment here" id="address"></textarea>
                                <label for="address">Address</label>  
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="joined_year" id="joined_year" placeholder="Password">
                                <label for="joined_year">Joined Year</label>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="profile_picture">Profile Picture</label> -->
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept=".jpg,.png,.jpeg" required>
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img
                                            src="{{ Storage::url($user->profile_picture) }}"
                                            alt=""
                                            style="width: 45px; height: 45px"
                                            class="rounded-circle"
                                            />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $user->name }}</p>
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->designation }}</p>
                                    </td>
                                    <td>

                                        <!-- <span class="badge text-bg-secondary rounded-pill d-inline">Teacher</span> -->
                                        <!-- <span class="badge text-bg-secondary rounded-pill d-inline">{{ $user->acc_type }}</span> -->
                                        @if ($user->acc_type == "Teacher" )
                                            <span class="badge text-bg-secondary rounded-pill d-inline">Teacher</span>
                                        @elseif ($user->acc_type == "Office Staff" )
                                            <span class="badge text-bg-success rounded-pill d-inline">Office Staff</span>
                                        @else
                                            <span class="badge text-bg-danger rounded-pill d-inline">System Admin</span>
                                        @endif

                                    </td>
                                    <td>{{ $user->joined_year }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded user-edit-btn" id="{{ $user->id }}">
                                            <i class="bi bi-pencil-square h5"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded user-dlt-btn" id="{{ $user->id }}">
                                            <i class="bi bi-trash3-fill h5 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>                             
                            @endforeach
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