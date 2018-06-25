<?php
    require_once('functionsVendas.php');
	indexVendas();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<hr>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h2>Vendas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="addVendas.php"><i class="fa fa-plus"></i> Cadastrar Venda</a>
	    	<a class="btn btn-default" href="indexVendas.php"><i class="fa fa-refresh"></i> Atualizar </a>
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
			<th class="table-secondary" scope="col">Código</th>
			<th class="table-secondary" scope="col">Valor</th>
			<th class="table-secondary" scope="col">Data</th>
			<th class="table-secondary" scope="col">CPF do comprador</th>
			<th class="table-secondary" scope="col">Código do pagamento</th>
	    <th class="table-secondary" scope="col">Opções</th>
		</tr>
	</thead>
	<tbody>

	<?php
	if ($vendas) :
		foreach ($vendas as $venda) : ?><tr>
			<td><?php echo $venda["CODVENDA"]; ?></td>
			<td><?php echo $venda["VALOR_VENDA"]; ?></td>
			<td><?php echo $venda["DATA_VENDA"]; ?></td>
			<td><?php echo $venda["CPF"]; ?></td>
			<td><?php echo $venda["CODPAG"]; ?></td>

			<td class="table-secondary">
				<a href="viewVendas.php?id=<?php echo $venda['CODVENDA']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="editVendas.php?id=<?php echo $venda['CODVENDA']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $venda['CODVENDA']; ?>">Excluir
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

<!--<?php include('modal.php'); ?> -->

<?php include(FOOTER_TEMPLATE); ?>
