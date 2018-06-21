<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>vendas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Cadastrar Venda</a>
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
			<th class="table-secondary" scope="col">Titulo</th>
			<th class="table-secondary" scope="col">Preço</th>
			<th class="table-secondary" scope="col">Descrição</th>
			<th class="table-secondary" scope="col">Imagem</th>
			<th class="table-secondary" scope="col">Opções</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($vendas) : ?>
	<?php foreach ($vendas as $venda) : ?>	<tr>
			<td><?php echo $venda["CODPROD"]; ?></td>
			<td><?php echo $venda["TITULO"]; ?></td>
			<td><?php echo $venda["PRECO"]; ?></td>
			<td><?php echo $venda["DESCRICAO"]; ?></td>
			<td><?php echo $venda["IMAGEM"]; ?></td>
				
			<td class="table-secondary">
				<a href="view.php?id=<?php echo $venda['CODPROD']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
				<a href="edit.php?id=<?php echo $venda['CODPROD']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-venda="<?php echo $venda['CODPROD']; ?>">
					<i class="fa fa-trash"></i> Excluir
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php else : ?>
		<tr>
			<td colspan="6">Nenhuma venda encontrada.</td>
		</tr>
	<?php endif; ?>
	</tbody>
	</table>
</div>

<?php include(FOOTER_TEMPLATE); ?>