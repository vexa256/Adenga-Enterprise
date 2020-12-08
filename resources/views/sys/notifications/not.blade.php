@isset($Notifications)

		<script type="text/javascript">


			   $(function() {


			   	Swal.fire('Information', '{{$message}}', '{{$not_type}}')



			   });


		</script>


  @endisset




  @if (session('status'))

    <script type="text/javascript">

			   $(function() {

		        Swal.fire('Information', '{{ session("status") }}', 'success');

				});
	</script>

 @endif

 @if (session('error_a'))

    <script type="text/javascript">

         $(function() {

            Swal.fire('Information', '{{ session("error_a") }}', 'error');

        });
  </script>

 @endif



 @if (session('statuss'))

<script type="text/javascript">

$(document).ready(function() {

	   Swal.fire('Information', '{{ session("statuss") }}', 'success');

    $("#BankTRansactions9292292929").modal('show');
});


</script>



 @endif



 <script type="text/javascript">
$(document).ready(function() {

    $( ".certificate_a" ).click(function() {

      Swal.fire('Certificate Template Missing','No Certificate Template has been Detected. Upload it and try again', 'error');


    });

     $( ".dis" ).click(function() {

      Swal.fire('Demo License Detected','This feature is only available to commercial license users', 'error');


    });









 	$( ".fffffff" ).click(function() {


 		let timerInterval
Swal.fire({
  title: 'Module loaded but not active',
  html: 'Trying agrasive loading <b></b> methods, checking cache.....',
  timer: 9000,
  timerProgressBar: true,
  willOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})

	});
	});


 </script>