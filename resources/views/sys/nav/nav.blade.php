<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="btn btn-danger btn-sm text-light shadow-lg btn-sm nav-link">
        <i class="fas fa-home "></i>  Home</a>
      </li>


    <li class="nav-item ml-2 d-none d-sm-inline-block">
        <a href="{{ route('AttemptExam') }}" class="btn btn-primary btn-sm text-light shadow-lg btn-sm nav-link">
        <i class="fas fa-chalkboard  "></i>  My Exams</a>
    </li>

    <li class="nav-item ml-2 d-none d-sm-inline-block">
        <a href="{{ route('ScoreboardSelectCourse') }}" class="btn btn-primary btn-sm text-light shadow-lg btn-sm nav-link">
        <i class="fas fa-certificate  "></i> Certify</a>
    </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas text-primary fa-user-cog fa-2x"></i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Account Settings</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-wrench mr-2"></i> Update Account

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-trash mr-2"></i> Delete Account

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout

          </a>

      </li>


       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas text-primary fa-people-carry fa-2x"></i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">User Feedback</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-cog mr-2"></i> Suggest New Feature

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-question   mr-2"></i> Submit Complaints

          </a>

           <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dis">
            <i class="fas fa-asterisk  mr-2"></i> Open Support Ticket

          </a>


      </li>


    </ul>
  </nav>