<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
    <h5>  <i class="fas fa-compact-disc text-primary fa-2x"></i>  {!! $Title !!}</h5>
  </div>
</div>


<div class="container">
  <div class="card shadow-lg">
    <div class="card-header border-transparent">
      <h3 class="card-title">Course module settings


      </h3>
      <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                New Module</a>
    </div>
    <div class="card-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="table-responsive">
        <table class="data table-bordered table-striped table m-0">
          <thead>
            <tr>
              <th>Course</th>
              <th>Module</th>
              <th>Date Created</th>
              <th>Description</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @isset($Courses)
            @foreach ($Courses as $data)
            <tr>
              <td>{{ $data->CourseName }}</td>
              <td>{{ $data->ModuleName }}</td>
             <td> {{ date('F/j/Y',strtotime($data->created_at)) }} </td>

              <td>
                <a data-name="{{ $data->ModuleName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
                  <i class="fas fa-binoculars"></i> View
                </a>
              </td>


              <td><a
      data-name = "course module"
      data-route = "{{ route('DeleteCourseModule', ['id' => $data->id]) }}"

      href="#" class="btn deleteme  btn-danger shadow-lg btn-sm">

      <i class="fas fa-trash"></i>

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
        {{ $data->Description }}
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




<form class="" action="{{ route('CreateNewModule') }}" method="POST">
<div class="modal"  id="AddCountry">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Course Module Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="CourseID" value="{{ $CID }}">


                  <div class="row">
                    <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Module Name</label>
                        <input name="ModuleName"  type="text" required  class="form-control" >
                      </div>
                    </div>


                      <div class="col-md-12">
                          <label> Description</label>

                        <textarea name="Description" class="app_letters"></textarea>

                      </div>
                    </div>

                    @csrf





      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 </form>