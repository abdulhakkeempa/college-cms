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

</ul>

</aside><!-- End Sidebar-->


<main id="main" class="main">

<div class="pagetitle">
  <div class="d-flex justify-content-between">
    <h1>Users</h1>
    <i class="bi bi-list toggle-sidebar-btn" id="window-toggle-sidebar-btn"></i>
  </div>

</div><!-- End Page Title -->

<section class="section">
  <div class="container">
    <div class="row">
        <div class="col-12">
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
                        <td>Senior</td>
                        <td>
                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Edit
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Delete
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

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center" style="gap: 20px !important;">
        <a href="" class="btn btn-primary">Edit Profile</a>
        <a href="" class="btn btn-success">Change Password</a>            
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection