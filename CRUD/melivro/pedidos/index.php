<?php
    require_once('functions.php');
	indexUser();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<hr>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h2>Pedidos</h2>
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
			<th class="table-secondary" scope="col">Código Pedido</th>
			<th class="table-secondary" scope="col">Status Pedido</th>
			<th class="table-secondary" scope="col">Data Pedido</th>
			<th class="table-secondary" scope="col">CPF</th>
		</tr>
	</thead>
	<tbody>

	<?php
	if ($pedidos) :
		foreach ($pedidos as $pedido) : ?>
		<tr>
			<td scope="row"><?php echo $pedido["CODPEDIDO"]; ?></td>
			<td><?php echo $pedido["STATUS_PED"]; ?></td>
			<td><?php echo $pedido["DATA_PEDIDO"]; ?></td>
			<td><?php echo $pedido["CPF"]; ?></td>

			<td class="table-secondary">
				<a href="view.php?id=<?php echo $pedido['CODPEDIDO']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="edit.php?id=<?php echo $pedido['CODPEDIDO']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $pedido['CODPEDIDO']; ?>">Excluir
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
