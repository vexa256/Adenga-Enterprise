<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h6>  <i class="fas fa-file-Video text-primary fa-2x"></i>  {!! $Title !!}</h6>

                </div>
</div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">Course Video content management


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                New Video File</a>

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
                      <th>Video Title</th>
                      <th>Description</th>
                      <th>Play</th>
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
                        	<td>{{ $data->VideoName }}</td>

                        	<td>

                        			<a data-name="{{ $data->VideoName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                        				<i class="fas fa-binoculars"></i> View

                        			</a>


                        	</td>
                          <td>  <a data-name="{{ $data->VideoName }}" href="#etets{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                                <i class="fas fa-play-circle"></i> Play

                              </a>

                            </td>
                      <td style="padding: 10px !important" >
                        {{ date('M-d-Y',strtotime($data->created_at)) }} </td>

    <td><a
      data-name = "Video file"
      data-route = "{{ route('DeleteVideoFile', ['id' => $data->id, 'Module' => $Mod]) }}"

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
        <h5 class="modal-title">Video course content Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="{{ route('PostVideoContent') }}" method="POST" enctype="multipart/form-data">

      	<input type="hidden" required name="inst" value="{{ $inst }}">
        <input type="hidden" required name="cos" value="{{ $cos }}">
        <input type="hidden" required name="dept" value="{{ $dept }}">
        <input type="hidden" required name="instructor" value="{{ $instructor }}">
        <input type="hidden" required name="Module" value="{{ $Mod }}">

        <div class="row">
                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Video Title</label>
                        <input name="VideoName"  type="text" required  class="form-control" >
                      </div>
                    </div>


                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Video File</label>
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                      </div>
                    </div>


                      <div class="col-md-12">
                          <label>Video Content Description</label>

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


  @isset($notes)
                        @foreach ($notes as $data)


<div class="modal"  id="etet{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Video content :: <span class="text-danger font-weight-bold screenme"></span></h5>
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






                      @isset($notes)
                        @foreach ($notes as $data)


<div class="modal"  id="etets{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Play Video content :: <span class="text-danger font-weight-bold screenme"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


               <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Video Course Content Player</h3>
                </div>
                <div class="card-body">

                  <video class="container-fluid" controls>
                  <source src="{{ url($data->Url) }}" type="video/mp4">
                   Your browser does not support the video tag.
                   </video>


             </div>
           </div>

      </div>
      <div class="modal-footer">


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    @endforeach
                      @endisset