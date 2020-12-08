<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-building text-primary fa-2x"></i>  {!! $Title !!}</h5>

                  <p>Manage all departments attached to the selected institution. This interface also gives you the ability to create new departments</p>
                </div>
</div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">All departments attached to {{ $Name }}


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                Add Department</a>

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
                      <th>Parent Institution</th>
                      <th>Department Name</th>
                      <th>Description</th>
                      <th>Date Created</th>
                      <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                      @isset($depts)
                        @foreach ($depts as $data)
                        <tr>

                        	<td>{{ $Name }}</td>
                        	<td>{{ $data->Department }}</td>
                        	<td>

                        			<a data-name="{{ $data->Department }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                        				<i class="fas fa-binoculars"></i> View

                        			</a>


                        	</td>
                      <td style="padding: 10px !important" >
                        {{ date('F/j/Y',strtotime($data->created_at)) }} </td>

    <td><a
      data-name = "department"
      data-route = "{{ route('DeleteDepartment', ['id' => $data->id]) }}"

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
<form  action="{{ route('CreateDepartment') }}" method="POST">

      	<input type="hidden" required name="id" value="{{ $id }}">

        <div class="row">
                    <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Department Name</label>
                        <input name="Department"  type="text" required  class="form-control" >
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


  @isset($depts)
                        @foreach ($depts as $data)


<div class="modal"  id="etet{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Description :: <span class="text-danger font-weight-bold screenme"></span></h5>
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