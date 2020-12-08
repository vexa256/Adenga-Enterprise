<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-building text-primary fa-2x"></i>  {!! $Title !!}</h5>




                </div>
</div>

<div class="col-md-6">

  <div class="container-fluid">

    <div class="card shadow-lg">

      <div class="card-header border-transparent">

        <h3  class="card-title">Selected Critical Course  Properties</h3>

         <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                New Course</a>

      </div>


      <div class="card-body">
        <table class="table table-bordered table-striped table-primary">
  <thead>
    <tr>
      <th scope="col">Institution</th>
      <th scope="col">Department</th>
      <th scope="col">Instructor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>{{ $b->InstitutionName }}</td>
        <td>{{ $a->Department }}</td>

      <td>{{ $CourseInstructors->InstructorName }}</td>

    </tr>

  </tbody>
</table>
      </div>

    </div>

  </div>

</div>

<div class="col-md-6">
<div class="container">
  <div class="card shadow-lg">
     <div class="card-header border-transparent">
                <h3 class="card-title">All courses attached to the selected entities


                </h3>


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
                  <table class=" table-bordered table-striped table m-0">
                    <thead>
                    <tr>
                      <th>Course Name</th>
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
                          <td> {{ date('F/j/Y',strtotime($data->created_at)) }} </td>
                          <td>

                         <a data-name="{{ $data->CourseName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                                <i class="fas fa-binoculars"></i> View

                              </a>


                          </td>


    <td><a
      data-name = "course"
      data-route = "{{ route('DeleteCourse', ['id' => $data->id, 'instructor' => $CourseInstructors->id]) }}"

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
</div>





<div class="modal"  id="AddCountry">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Course Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="{{ route('CreateCourseLogic') }}" method="POST">

  <input type="hidden" name="Institution" value="{{ $b->id}}">
  <input type="hidden" name="Department" value="{{ $a->id}}">
  <input type="hidden" name="Instructor" value="{{ $CourseInstructors->id }}">
        <div class="row">
                    <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Course Name</label>
                        <input name="CourseName"  type="text" required  class="form-control" >
                      </div>
                    </div>


                      <div class="col-md-12">
                          <label> Description</label>

                        <textarea required name="Description" class="app_letters"></textarea>

                      </div>
                    </div>

                    @csrf





      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
 </form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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