<?php
  require_once('functions.php');
  editUser();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Pedido</h2>


<form action="edit.php?id=<?php echo $pedido['CODPEDIDO'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Código Pedido</label>
      <input type="text" class="form-control" name="pedido['codpedido']" value="<?php echo $pedido['CODPEDIDO'];?>" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="pedido['cpf']" maxlength="14"value="<?php echo $pedido['CPF'];?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo3">Data Pedido</label>
      <input type="date" class="form-control" name="pedido['data_pedido']" value="<?php echo $pedido['DATA_PEDIDO'];?>">
    </div>
	    <div class="form-group col-md-7">
      <label for="campo1">Status Pedido</label>
      <input type="text" class="form-control" name="pedido['status_ped']" value="<?php echo $pedido['STATUS_PED'];?>">
    </div>
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
