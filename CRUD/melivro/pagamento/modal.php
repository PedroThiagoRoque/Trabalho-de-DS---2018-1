<!-- Modal de Delete-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<h4 class="modal-title" id="modalLabel">Excluir Pagamento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este pagamento?
      </div>
      <div class="modal-footer">
        <a class="confirm btn btn-primary" href='delete.php'>Sim</a>
        <a id="cancel" class="btn btn-default" href='index.php' data-dismiss="modal">Não</a>
      </div>
    </div>
  </div>
</div> <!-- /.modal -->