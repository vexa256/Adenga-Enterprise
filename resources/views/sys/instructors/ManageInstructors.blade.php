<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-building text-primary fa-2x"></i>  {!! $Title !!}</h5>

                  <p>The currently selected institution is <span class="text-danger">

                    {{ $Institution }}

                  </span>

                  and the department is <span class="text-danger">

                      {{ $Department }}

                  </span>

                </p>
                </div>
</div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">All instructors attached to the selected institution and department


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                Create Instructor</a>

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
                      <th>Institution</th>
                      <th>Department</th>
                      <th>Instructor</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Country</th>
                      <th>Instructor Email</th>
                      <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                      @isset($Instructors)
                        @foreach ($Instructors as $data)
                        <tr>

                        	<td> {{ $Institution }}</td>
                          <td>  {{ $Department }}</td>
                          <td>{{ $data->InstructorName }}</td>
                          <td>{{ $data->PhoneNumber }}</td>
                          <td>{{ $data->Address }}</td>
                          <td>{{ $data->Country }}</td>
                          <td>{{ $data->Email }}</td>

    <td><a

      data-name = "entity"

      data-route = "{{ route('DeleteInstructor', ['id' => $data->id, 'Departments'=> $Department_id]) }}"

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




<div class="modal"  id="AddCountry">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Institution Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="{{ route('SubmitInstructor') }}" method="POST">

      	<input type="hidden" required name="DepartmentID" value="{{ $Department_id }}">
        <input type="hidden" required name="InstitutionID" value="{{ $institution_id }}">

        <div class="row">
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Instructor Name</label>
                        <input name="InstructorName"  type="text" required  class="form-control" >
                      </div>
                    </div>


                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input name="PhoneNumber"  type="text" required  class="form-control" >
                      </div>
                    </div>




                     <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label>
                        <input name="Address"  type="text" required  class="form-control" >
                      </div>
                    </div>




                   <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
              <label>Country </label>
              <select required name ="Country" class="getdesc form-control select2bs4">
                <option selected="selected"></option>

                @isset($Countries)
                @foreach ($Countries as $data)


                <option value="{{ $data->Country }}">{{ $data->Country }}</option>

                @endforeach
                @endisset

              </select>
                      </div>
                    </div>


                      <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email/Username</label>
                        <input name="Email"  type="text" required  class="form-control" >
                      </div>
                    </div>


                      <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" id="password" type="text" required  class="form-control" >
                      </div>
                    </div>




                      <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="password_confirmation" id="password_confirmation"  type="text" required  class="form-control" >
                      </div>
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


