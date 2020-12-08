<div class="col-md-12">
	<div class="callout callout-danger shadow-lg">
		<h4>  <i class="fas fa-chart-line text-primary fa-2x"></i>  {!! $Title !!} .
		<small>The selected Course is</small> <small class="text-danger"> {{ $CourseName }}</small>
		</h4>
	</div>
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Total Course Exams</span>
			<span class="info-box-number">
				1
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-folder-open"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Total Course Exam Questions</span>
			<span class="info-box-number">
				{{ $ExamCount }}
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-edit"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Attempted Exam Questions</span>
			<span class="info-box-number">
				{{ $AttemptCount }}
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Passed Exam Questions</span>
			<span class="info-box-number">
				{{ $Passmark }}%
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Failed Exam Questions</span>
			<span class="info-box-number">
				{{ $Failmark }}%
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4">
	<div class="info-box shadow-lg">
		<span class="info-box-icon bg-success elevation-1"><i class="fas fa-certificate"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Certification Status</span>
			<span class="info-box-number">
				@if ($CertificationStatus == 'true')
				Certification Approved
				@endif
				@if ($CertificationStatus != 'true')
				Certification Denied
				@endif
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="container">
	<div class="row">
		<div class="card shadow-lg">
			<div class="card-header">
				<h6 class="card-title" style="font-size: 14px">The certification button only becomes active after you have scored more than 50%  in the course exam. Clicking re-attempt exam deletes all your current scores in relation to this course</h6>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>

							<th scope="col">Print Certificate</th>
							<th scope="col">Re-attempt Course Exam</th>

						</tr>
					</thead>
					<tbody>

						<tr>

							<td>@if ($CertificationStatus == 'true')
			<a href="#" class="btn btn-danger certificate_a">
				<i class="fas fa-certificate"></i>  Certify

			</a>
				@endif
				@if ($CertificationStatus != 'true')
				Certification Denied
				@endif</td>
							<td><a href="{{ route('ReAttemptExam', ['id' => $id]) }}" class="btn btn-primary ">
				<i class="fas fa-times"></i>  Re-attempt Exam

			</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>