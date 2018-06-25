<?php
	require_once('functions.php');
	viewUser($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class="display-3">Pedido <?php echo $pedido['CODPEDIDO']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<form>
  <div class="form-group row">
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">Código Pedido</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $pedido['CODPEDIDO']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CPF</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $pedido['CPF']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">Status Pedido</label>
		<div class="col-sm-10">
				<input class="form-control" type="text" placeholder="<?php echo $pedido['STATUS_PED']; ?>"readonly>
		</div>
	</div>
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Data Pedido</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $pedido['DATA_PEDIDO']; ?>" readonly>
		</div>
	</div>
  </div>
</form>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $pedido['CPF']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
