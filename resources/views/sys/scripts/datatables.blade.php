<script type="text/javascript">
$(function () {

    $('.data').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf',  'colvis'
        ],
    });

    $('.usert').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

    });
  });


</script>