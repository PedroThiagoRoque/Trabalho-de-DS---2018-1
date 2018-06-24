<?php
    require_once('functionsPag.php');
	indexPagamentos();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<hr>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h2>Pagamentos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Realizar Pagamento</a>
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
			<th class="table-secondary" scope="col">ID</th>
			<th class="table-secondary" scope="col">Metodo</th>
			<th class="table-secondary" scope="col">Valor</th>
			<th class="table-secondary" scope="col">Concretizado</th>
			<th class="table-secondary" scope="col">Opções</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	if ($pagamentos) : 
		foreach ($pagamentos as $pagamento) : ?>	
		<tr>
			<td scope="row"><?php echo $pagamento["CODPAG"]; ?></td>
			<td><?php echo $pagamento["METODO_PAG"]; ?></td>
			<td><?php echo $pagamento["VALOR"]; ?></td>
			<td><?php echo $pagamento["CONCRETIZADO"]; ?></td>

			<td class="table-secondary">
				<a href="view.php?id=<?php echo $pagamento['CODPAG']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="edit.php?id=<?php echo $pagamento['CODPAG']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="delete.php" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $pagamento['CODPAG']; ?>">Excluir
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