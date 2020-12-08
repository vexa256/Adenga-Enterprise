
<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h6>  <i class="fas fa-folder-minus text-primary fa-2x"></i>  {!! $Title !!}</h6>

                </div>
</div>



<div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Course Exam Question</span>
                <span class="info-box-number">
                  {{ $ExamCount }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
<div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Attempted Exam Questions</span>
                <span class="info-box-number">
              {{ $AttemptCount }}

                </span>
                  <a href="{{ route('ScoreboardSelectCourse') }}" class="float-right shadow-lg btn btn-dark shadow-lg btn-sm">Go to Scoreboard</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>



<div class="container">
	<div class="card">
		 <div class="card-header border-transparent">
                <h3 class="card-title">Select Course Exam to Attempt

                  <small class="text-danger">You can not attempt an exam more than once , To re-attempt an exam , go to score board and select re-attempt exam</small>

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
                  <table class="usert table-bordered table-striped table m-0">
                    <thead>
                    <tr>
                      <th>Course</th>

                      <th>Attempt Exam</th>
                      <th>Date Created</th>


                    </tr>
                    </thead>
                    <tbody>
                      @isset($notes)
                        @foreach ($notes as $data)
                        <tr>

                        	<td>{{ $Course }}</td>

                        	<td><a data-name="{{ $data->Questionkey }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">

                                <i class="fas fa-binoculars"></i> Attempt Exam

                              </a>

                      </td>
                        <td style="padding: 10px !important" >
                        {{ date('M-d-Y',strtotime($data->created_at)) }} </td>




                            </tr>

                        @endforeach
                      @endisset




                    </tbody>
                  </table>
                </div>



		</div>

	</div>
</div>





  @isset($notes)
                        @foreach ($notes as $data)

<form  action="{{ route('SubmitExamAnswer') }}" method="POST">
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

           <input type="hidden" required name="inst" value="{{ $inst }}">
          <input type="hidden" required name="cos" value="{{ $cos }}">
          <input type="hidden" required name="dept" value="{{ $dept }}">
          <input type="hidden" required name="instructor" value="{{ $instructor }}">
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
                        <label>Enter Correct Integer Answer Option</label>
                        <input name="UserAnswer" value="" type="number" required  class="form-control" >
                      </div>
                    </div>




                    </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-danger" >Attempt Questions</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>

    @endforeach
                      @endisset




