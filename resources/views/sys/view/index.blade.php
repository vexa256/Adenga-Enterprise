@include('sys.header.header')
@include('sys.nav.nav')

@if (Auth::user()->role == 'admin')
		@include('sys.nav.sidebar')
@endif

@if (Auth::user()->role != 'admin')
		@include('sys.nav.UserSidebar')
@endif

<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">


			</div>
		</div>
	</div>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					@isset($Page)
					@include($Page)
					@endisset

				</div>
			</div>
		</div>
	</div>

	@include('sys.footer.footer')
	@include('sys.footer.scripts')