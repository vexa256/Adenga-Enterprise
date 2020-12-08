<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h6>  <i class="fas fa-file-audio text-primary fa-2x"></i>  {!! $Title !!}</h6>

                </div>
</div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">Course exams question management


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

               Set Exam</a>

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
                      <th>Exam</th>
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
                        	<td><a data-name="{{ $data->Questionkey }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                                <i class="fas fa-binoculars"></i> View

                              </a>

                      </td>
                        <td style="padding: 10px !important" >
                        {{ date('M-d-Y',strtotime($data->created_at)) }} </td>




    <td><a
      data-name = "exam question"
      data-route = "{{ route('DeleteExamQuestion', ['id' => $data->id, 'Module' => $Mod]) }}"

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
        <h5 class="modal-title">Exam Question Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="{{ route('CreateExams') }}" method="POST">

      	<input type="hidden" required name="inst" value="{{ $inst }}">
        <input type="hidden" required name="cos" value="{{ $cos }}">
        <input type="hidden" required name="dept" value="{{ $dept }}">
        <input type="hidden" required name="instructor" value="{{ $instructor }}">
        <input type="hidden" required name="Module" value="{{ $Mod }}">

        <div class="row">


                      <div class="col-md-8">
                          <label>Exam Question</label>

                        <textarea required name="Qn" class="app_letters"><h1>Question</h1> <h2>Type the exam question here !!!!!!!!!!!!!</h2> <p>&lt;==========================================================&gt;</p> <p>&nbsp;</p> <h1>Answer&nbsp;Options</h1> <ol> <li> <h3><strong>First Objective</strong></h3> </li> <li> <h3><strong>Second Objective</strong></h3> </li> <li> <h3><strong>Fourth Objective</strong></h3> </li> <li> <h3><strong>Fifth Objective</strong></h3> </li> <li> <h3><strong>Sixth Object</strong></h3> </li> <li> <h3><strong>ETC</strong></h3> </li> </ol> <p>&lt;==========================================================&gt;</p></textarea>

                      </div>
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Correct Answer Option</label>
                        <input name="Ans"  type="number" required  class="form-control" >
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


  @isset($notes)
                        @foreach ($notes as $data)

<form  action="{{ route('UpdateExams') }}" method="POST">
<div class="modal"  id="etet{{ $data->id }}">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exam Question for the Course Module :: <span class="text-danger font-weight-bold screenme"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">

          <input type="hidden" name="id" value="{{ $data->id }}">
  <input type="hidden" required name="Module" value="{{ $Mod }}">

                      <div class="col-md-8">
                          <label>Exam Question</label>

                        <textarea required name="Qn" class="app_letters">
                          {{$data->Qn }}

                        </textarea>

       @csrf
                      </div>
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Correct Answer Option</label>
                        <input name="Ans" value="{{$data->Ans  }}" type="number" required  class="form-control" >
                      </div>
                    </div>




                    </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-danger" >Update Question</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>

    @endforeach
                      @endisset




