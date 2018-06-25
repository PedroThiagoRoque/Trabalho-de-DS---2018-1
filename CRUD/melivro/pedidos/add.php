<?php
  require_once('functions.php');
  addUser();
?>

<?php include(HEADER_TEMPLATE); ?>
 <body>
 	<hr>
	<hr>
    <div id = "conteudo">
    <h2 class="display-3"> Novo Pedido </h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">

    <div class="form-group col-md-4">
      <label for="campo2">Status Pedido</label>
      <input type="text" class="form-control" name="pedido['STATUS_PED']" placeholder="Digite o status do pedido" maxlength="14">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">Data Pedido</label>
      <input type="date" class="form-control" name="pedido['DATA_PEDIDO']" maxlength="15" placeholder="Digite a da data do pedido">
    </div>
    <div class="form-group col-md-7">
      <label for="campo1">CPF</label>
      <input type="text" class="form-control" name="pedido['CPF']" placeholder="Digite seu CPF">
    </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>
</body>

<?php include(FOOTER_TEMPLATE); ?>
