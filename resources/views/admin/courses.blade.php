@extends(layouts/master)
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
    <a class="nav-link" href="{{ url('users') }}">
      <i class="bi bi-grid"></i>
      <span>Users</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->


@endsection