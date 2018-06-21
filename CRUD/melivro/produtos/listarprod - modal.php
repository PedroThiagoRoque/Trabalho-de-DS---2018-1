<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>produtos</h2>
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
			<th class="table-secondary" scope="col">ID</th>
			<th class="table-secondary" scope="col">Titulo</th>
			<th class="table-secondary" scope="col">Preço</th>
			<th class="table-secondary" scope="col">Descrição</th>
			<th class="table-secondary" scope="col">Imagem</th>
			<th class="table-secondary" scope="col">Opções</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($produtos) : ?>
	<?php foreach ($produtos as $produto) : ?>	<tr>
			<td><?php echo $produto["CODPROD"]; ?></td>
			<td><?php echo $produto["TITULO"]; ?></td>
			<td><?php echo $produto["PRECO"]; ?></td>
			<td><?php echo $produto["DESCRICAO"]; ?></td>
			<td><?php echo $produto["IMAGEM"]; ?></td>
				
			<td class="table-secondary">
				<!-- <a href="view.php?id=<?php echo $produto['CODPROD']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a> -->
				<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-eye"></i> Visualizar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
      $text=$produto['CODPROD'];
      echo $text;?>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
				<a href="edit.php?id=<?php echo $produto['CODPROD']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-produto="<?php echo $produto['CODPROD']; ?>">
					<i class="fa fa-trash"></i> Excluir
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

<?php include(FOOTER_TEMPLATE); ?>
