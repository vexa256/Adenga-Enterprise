<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-box text-primary fa-2x"></i>  {{ $Title }}</h5>


                </div>
</div>



<div class="container">
	<div class="col-md-12">

	<div class="card shadow-lg">
		<div class="card-header">

			<h3>Course Module Selection Form</h3>
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
			<form method="POST" action="{{ route('ManageTextNotes') }}">

				@csrf


			<label>Select Course Module <small class="text-danger">Course instructor shown in brackets</small></label>
              <select required name ="Module" class="getdesc form-control select2bs4">
                <option selected="selected"></option>

                @isset($Courses)
                @foreach ($Courses as $data)


                <option value="{{ $data->id }}">{{ $data->ModuleName }} ({{ $data->InstructorName }})</option>

                @endforeach
                @endisset

              </select>

                <button type="submit" class="btn mt-2 shadow-lg float-right btn-primary">
                	<i class="fas fa-check"></i>
                Proceed</button>


          </form>

		</div>
	</div>

</div>


</div>