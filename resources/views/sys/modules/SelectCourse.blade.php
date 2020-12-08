<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
    <h5>  <i class="fas fa-compact-disc text-primary fa-2x"></i>  {!! $Title !!}</h5>
  </div>
</div>


<div class="container">
  <div class="card shadow-lg">
    <div class="card-header border-transparent">
      <h3 class="card-title">Select the course whose modules are to be managed
      </h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="data table-bordered table-striped table m-0">
          <thead>
            <tr>
              <th>Institution</th>
              <th>Department</th>
              <th>Instructor</th>
              <th>Course</th>
              <th>Description</th>
              <th>Date Created</th>
              <th>Manage Modules</th>
            </tr>
          </thead>
          <tbody>
            @isset($Courses)
            @foreach ($Courses as $data)
            <tr>
              <td>{{ $data->InstitutionName }}</td>
              <td>{{ $data->DepartmentName }}</td>
              <td>{{ $data->InstructorName }}</td>
              <td>{{ $data->CourseName }}</td>
              <td>
                <a data-name="{{ $data->CourseName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
                  <i class="fas fa-binoculars"></i> View
                </a>
              </td>
              <td style="padding: 10px !important" >
              {{ date('F/j/Y',strtotime($data->CreateWhen)) }} </td>

              <td><a href="{{ route('ManageCourseModules', ['id'=>$data->CID]) }}" class="btn btn-sm btn-danger shadow-lg">

                <i class="fas fa-cog"></i> Manage
              </a></td>
            </tr>
            @endforeach
            @endisset
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@isset($Courses)
@foreach ($Courses as $data)
<div class="modal"  id="etet{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Description for the course:: <span class="text-danger font-weight-bold screenme"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea name="Description{{ $data->id }}" class="app_letters">
        {{ $data->CourseDescription }}
        </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endisset