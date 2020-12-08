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
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Accademic Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ManageInstitutions') }}" class="nav-link ">
                <i class="fas fa-warehouse  nav-icon"></i>
                <p>Manage Institutions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('SelectInstitution') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Departments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('CourseInstructorSelectInstitution') }}" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Manage Instructors</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-university"></i>
            <p>
              Course Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

             <li class="nav-item">
              <a href="{{ route('SelectCourseInstitution') }}" class="nav-link">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>Manage Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('CourseModuleSelectCourse') }}" class="nav-link ">
                <i class="fas fa-circle-notch  nav-icon"></i>
                <p>Manage Modules</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{ route('NotesContentSelectCourse') }}" class="nav-link ">
                <i class="fas fa-book  nav-icon"></i>
                <p>Text Content</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{ route('DocumentSelectCourse') }}" class="nav-link ">
                <i class="fas fa-file-upload  nav-icon"></i>
                <p>Document Content</p>
              </a>
            </li>



             <li class="nav-item">
              <a href="{{ route('AudioSelectCourse') }}" class="nav-link ">
                <i class="fas fa-file-audio  nav-icon"></i>
                <p>Audio Content</p>
              </a>
            </li>



             <li class="nav-item">
              <a href="{{ route('VideoSelectCourse') }}" class="nav-link ">
                <i class="fas fa-video  nav-icon"></i>
                <p>Video Content</p>
              </a>
            </li>



             <li class="nav-item">
              <a href="{{ route('SelectCourseAttendLectures') }}" class="nav-link ">
                <i class="fas fa-chalkboard  nav-icon"></i>
                <p>Attend Lectures</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Exam Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('ExamSelectCourse') }}" class="nav-link">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Manage  Exams</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="{{ route('AttemptExam') }}" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
                <p>Attempt  Exams</p>
              </a>
            </li>


           <li class="nav-item">
              <a href="{{ route('ScoreboardSelectCourse') }}" class="nav-link">
                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                <p>Scoreboard</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-chart-area"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-warehouse  nav-icon"></i>
                <p>Exam Analytics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="far fa-circle nav-icon"></i>
                <p>Course Analytics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-chart-pie nav-icon"></i>
                <p>Country Analytics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Certification Analytics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-laptop-house nav-icon"></i>
                <p>Institution Analytics</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-user-tag nav-icon"></i>
                <p>Student Analytics</p>
              </a>
            </li>


          </ul>
        </li>
         <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Manage Students</p>
              </a>
            </li>
              <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                <p>Manage Instructors</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-university nav-icon"></i>
                <p>Manage Institutions</p>
              </a>
            </li>

             <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-user-lock nav-icon"></i>
                <p>Manage Admins</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
             System Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('ManageCountries') }}" class="nav-link ">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Supported Countries</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>SMTP Settings</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Activate CMS</p>
              </a>
            </li>
             <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Manage DAA</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Database Backup</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Configure APCu</p>
              </a>
            </li>
             <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Configure Reports</p>
              </a>
            </li>
             <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Install Update</p>
              </a>
            </li>
            <li class="nav-item">
             <a href="#" class="nav-link dis">
                <i class="fas fa-user-astronaut  nav-icon"></i>
                <p>Change Licence</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link dis">
                <i class="fas fa-user-circle nav-icon"></i>
                <p>Reporting Settings</p>
              </a>
            </li>
             <li class="nav-item dis">
              <a href="#" class="nav-link">
                <i class="fas fa-user-circle nav-icon"></i>
                <p>Feedback Settings</p>
              </a>
            </li>

          </ul>
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