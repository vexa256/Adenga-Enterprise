<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
@include("sys.scripts.CustomFileInput")
<script src="{{ url('plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script type="text/javascript">
	$(function () {


function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[type="number"]', forceNumeric);

	$('#from_date_aa').datetimepicker({
        format: 'L'
    });


    $('#to_date_aa').datetimepicker({
        format: 'L'
    });

			$('.avhsvshsa').on( "click", function() {

				var name = $(this).data('namess');
				var employeeid = $(this).data('employeeid');
				var userid = $(this).data('userid');

				$('#screener_a').html(name);
				$('#EmployeeID').val(employeeid);
				$('#UserID').val(userid);

			});
	});


</script>
@include("sys.scripts.swal2")
@include("sys.notifications.not")


<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



@include('sys.scripts.chartjs')


@isset($chart)
   {!! $chart->script() !!}
@endisset

@isset($chart_a)
   {!! $chart_a->script() !!}
@endisset

@isset($chart2)
   {!! $chart2->script() !!}
@endisset


@isset($Quarter_one_chart)
    {!! $Quarter_one_chart->script() !!}
@endisset




@isset($Quarter_two_chart)
    {!! $Quarter_two_chart->script() !!}
@endisset



@isset($Quarter_three_chart)
    {!! $Quarter_three_chart->script() !!}
@endisset





@isset($Quarter_four_chart)
    {!! $Quarter_four_chart->script() !!}
@endisset








<!-- sysLTE App -->
<script type="text/javascript" src="{{ url('dt/data/datatables.min.js') }}"></script>

<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>

@include("sys.scripts.selectbs4")
@include("sys.scripts.datatables")

<script src="{{ url('dist/js/syslte.min.js') }}"></script>

<script src="{{ url('ck/ckeditor.js') }}"></script>
<script src="{{ url('ck/adapters/jquery.js') }}"></script>
@include('sys.scripts.ck')

</body>
</html>
