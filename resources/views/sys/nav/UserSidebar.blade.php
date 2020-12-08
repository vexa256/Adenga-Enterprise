<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SRL Uganda </span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="img-circle fas fa-user text-light fa-2x"> </i>
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->



        <li class="nav-item">
          <a href="{{ route('SelectCourseAttendLectures') }}" class="nav-link">
            <i class="fas fa-pencil-alt nav-icon"></i>
            <p>Attend Lectures</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('AttemptExam') }}" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Attempt Exams</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('ScoreboardSelectCourse') }}" class="nav-link">
            <i class="fas fa-chalkboard nav-icon"></i>
            <p>Scoreboard Exams</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link dis">
            <i class="fas fa-chart-pie nav-icon"></i>
            <p>Performance Analytics</p>
          </a>
        </li>




         <li class="nav-item">
          <a href="javascript:void" onclick="$('#logout-form').submit();" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>