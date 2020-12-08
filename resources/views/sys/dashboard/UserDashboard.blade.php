<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
    <h3>  <i class="fas fa-cloud text-primary fa-2x"></i>  {!! $Title !!}

      <small class="text-danger">User Account Console</small>
    </h3>
  </div>
</div>

<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-boxes"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Available Course Modules</span>
			<span class="info-box-number">
				{{ $CourseModules }}
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book-open"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Available Courses</span>
			<span class="info-box-number">
				{{ $Courses }}
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Available Course Exams</span>
			<span class="info-box-number">
				{{ $Exams }}
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>

<div class="col-md-12 container-fluid">
<div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">Available Courses</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="font-size: 14px">


              	<table class="table usert">
  <thead>
    <tr>

      <th scope="col">Course Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>

@isset($Cos)
@foreach ($Cos as $data)
	  <td class="bg-dark text-light shadow-lg">{{ $data->CourseName }}</td>
@endforeach
@endisset

    </tr>

  </tbody>
</table>

              </div>
            </div>



</div>

<div class="col-md-12">
            <div class="card card-primary shadow-lg">
              <div class="card-header">
                <h3 class="card-title">About SRL Uganda</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="font-size: 14px">
              <p>The Uganda National Tuberculosis Reference Laboratory was started as the Uganda Bacteriological Investigation Unit in the late 1950’s under the then East African Community. The laboratory participated in anti TB clinical trials and drug toxicities under the then British Medical Research Council (MRC).

After the collapse of the East African Community in 1970’s, the laboratory reverted to the line ministries. Its name changed to Central Tuberculosis laboratory (CTBL) in 1980’s and National Tuberculosis Reference Laboratory in the 1990’S.</p>
<p>The Uganda National Tuberculosis Reference Laboratory established under the National Tuberculosis and Leprosy Programme (NLTP) of the Ministry of Health (MoH) received accreditation from the WHO in April 2013, making it the first SRL in East Africa, and the second in Sub-Saharan Africa to achieve this status.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>