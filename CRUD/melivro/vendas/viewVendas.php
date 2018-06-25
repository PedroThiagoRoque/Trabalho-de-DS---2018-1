<?php
	require_once('functionsVendas.php');
	viewVendas($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class="display-3">Venda <?php echo $venda['CODVENDA']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<form>
  <div class="form-group row">
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">CODIGO DA VENDA</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $venda['CODVENDA']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">VALOR</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $venda['VALOR_VENDA']; ?>" readonly>
		</div>
	</div>

  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">DATA</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $venda['DATA_VENDA']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CPF DO COMPPRADOR</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $venda['CPF']; ?>" readonly>
		</div>
	</div>
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CÓDIGO DO PAGAMENTO </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $venda['CODPAG']; ?>" readonly>
		</div>
	</div>
</form>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $venda['codvenda']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
