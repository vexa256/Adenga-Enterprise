<script type="text/javascript">

    $(function () {

		$( ".viewdesc" ).on( "click", function() {


			var name = $(this).data('name');


			$('.seeme').html(name);


		});


		$( ".seada" ).on( "click", function() {


			var name = $(this).data('name');


			$('.screenme').html(name);


		});



	$( ".deleteme" ).on( "click", function() {

		var name = $(this).data('name');

		var route = $(this).data('route');

		Swal.fire({
				  title: 'Are you sure?',
				  text: "You  want to delete this "+name+" and all its associated properties. This action can not be reversed",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete!'
				}).then((result) => {
				  if (result.isConfirmed) {

				  	window.location = route;


				  }
});
});
















	});
</script>