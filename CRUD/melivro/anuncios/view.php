<?php 
	require_once('functions_anun.php'); 
	viewUser($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class="display-3">Anuncio <?php echo $anuncio['CODANUNCIO']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<form>
  <div class="form-group row">
	<div class="col">
		<label for="staticEmail" class="col-sm-2 col-form-label">CODIGO</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['CODANUNCIO']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">TIPO</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['TIPO_PRODUTO']; ?>" readonly>
		</div>
	</div>
	
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">ATIVO</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['ATIVO']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">DATA PUBLICAÇÃO</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['DATA_PUBLICACAO']; ?>" readonly>
		</div>
	</div>
  </div>
  <div class="form-group row">
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CPF</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['CPF']; ?>" readonly>
		</div>
	</div>
	<div class="col">
		<label for="staticpass" class="col-sm-2 col-form-label">CODIGO PRODUTO</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" placeholder="<?php echo $anuncio['CODPROD']; ?>" readonly>
		</div>
	</div>
  </div>
</form>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $anuncio['codanuncio']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>