<?php
    require_once('functions_anun.php');
	indexUser();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<hr>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h2>anuncios</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Fazer Cadastro</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<div class="table-responsive-sm">
	<table class="table">
	<thead>
		<tr>
			<th class="table-secondary" scope="col">CODANUNCIO</th>
			<th class="table-secondary" scope="col">TIPO</th>
			<th class="table-secondary" scope="col">ATIVO</th>
			<th class="table-secondary" scope="col">DATA</th>
			<th class="table-secondary" scope="col">CPF</th>
			<th class="table-secondary" scope="col">CODPROD</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	if ($anuncios) : 
		foreach ($anuncios as $anuncio) : ?>	
		<tr>
			<td scope="row"><?php echo $anuncio["CODANUNCIO"]; ?></td>
			<td><?php echo $anuncio["TIPO_PRODUTO"]; ?></td>
			<td><?php echo $anuncio["ATIVO"]; ?></td>
			<td><?php echo $anuncio["DATA_PUBLICACAO"]; ?></td>
			
			<td><?php echo $anuncio["CPF"]; ?></td>
			<td><?php echo $anuncio["CODPROD"]; ?></td>
			<td class="table-secondary">
				<a href="view.php?id=<?php echo $anuncio['CODANUNCIO']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="edit.php?id=<?php echo $anuncio['CODANUNCIO']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $anuncio['CODANUNCIO']; ?>">Excluir
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td colspan="6">Nenhum registro encontrado.</td>
		</tr>
	<?php endif; ?>
	</tbody>
	</table>
</div>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>