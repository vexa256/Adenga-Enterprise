<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-building text-primary fa-2x"></i>  {!! $Title !!}</h5>

                </div>
</div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">Course text notes management


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                Add Notes</a>

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
                      <th>Notes Title</th>
                      <th>Notes</th>
                      <th>Date Created</th>
                      <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                      @isset($notes)
                        @foreach ($notes as $data)
                        <tr>

                        	<td>{{ $Course }}</td>
                          <td>{{ $Module }}</td>
                        	<td>{{ $data->NotesName }}</td>

                        	<td>

                        			<a data-name="{{ $data->NotesName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                        				<i class="fas fa-binoculars"></i> View

                        			</a>


                        	</td>
                      <td style="padding: 10px !important" >
                        {{ date('M-d-Y',strtotime($data->created_at)) }} </td>

    <td><a
      data-name = "text content"
      data-route = "{{ route('DeleteCourseTextNotes', ['id' => $data->id, 'Module' => $Mod]) }}"

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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Text notes Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="{{ route('CreateTextNotes') }}" method="POST">

      	<input type="hidden" required name="inst" value="{{ $inst }}">
        <input type="hidden" required name="cos" value="{{ $cos }}">
        <input type="hidden" required name="dept" value="{{ $dept }}">
        <input type="hidden" required name="instructor" value="{{ $instructor }}">
        <input type="hidden" required name="Module" value="{{ $Mod }}">

        <div class="row">
                    <div class="col-md-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Notes Title</label>
                        <input name="NotesName"  type="text" required  class="form-control" >
                      </div>
                    </div>


                      <div class="col-md-12">
                          <label>Type the notes here</label>

                        <textarea required name="Notes" class="app_letters"></textarea>

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


  @isset($notes)
                        @foreach ($notes as $data)


<div class="modal"  id="etet{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Text Notes :: <span class="text-danger font-weight-bold screenme"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      			  <textarea name="Description{{ $data->id }}" class="app_letters">

            {{ $data->Notes }}

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