<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
               <h5>  <i class="fas fa-file-alt text-primary fa-2x"></i>  {{ $Title }}</h5>

                  <p>Select the department that the instructor will be attached to </p>
                </div>
</div>



<div class="container">
	<div class="col-md-12">

	<div class="card shadow-lg">
		<div class="card-header">

			<h3>Department Selection Form</h3>
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
			<form method="POST" action="{{ route('CreateCourseInstructor') }}">

				@csrf


			<label> </label>
              <select required name ="Department" class="getdesc form-control select2bs4">


                @isset($Departments)
                @foreach ($Departments as $data)


                <option value="{{ $data->id }}">{{ $data->Department }}</option>

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