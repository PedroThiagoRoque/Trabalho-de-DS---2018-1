<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

$('#delete-modal').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('customer');

  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})
