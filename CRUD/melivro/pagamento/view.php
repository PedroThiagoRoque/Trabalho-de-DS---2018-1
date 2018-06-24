<?php 
	require_once('functionsPag.php'); 
	viewPagamentos($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class="display-3">Pagamento</h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<form>
  <div class="form-group row">
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">Metodo</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $pagamento['metodo_pag']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">Valor</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $pagamento['valor']; ?>" readonly>
		</div>
	</div>
  </div>
  </form>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $pagamento['codpag']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>