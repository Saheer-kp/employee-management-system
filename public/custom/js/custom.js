$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function () {
      bsCustomFileInput.init();
  });

  $('.delete-btn').click(function(event) {
    event.preventDefault();
    $.confirm({
        title: 'Delete!',
        content: 'Are you sure want to delete the employee?',
        buttons: {
            yes: function () {
                $('#delete-form').submit();
            },
            cancel: function () {
            }
        }
    });
  })

  setTimeout(function() {
     $('.alert').fadeOut() 
  }, 3000)