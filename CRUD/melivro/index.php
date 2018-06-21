<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<h1>Dashboard</h1>
<hr />

<?php if ($db) : ?>

<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="usuarios/add.php" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Fazer Cadastro</p>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="usuarios/index.php" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-user fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Ver Usuarios</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="produtos/find.php" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-book fa-5x"></i>
					</div>
				<div class="col-xs-12 text-center">
					<p>Buscar Produto</p>
				</div>
			</div>
		</a>
	</div>
</div>
<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="produtos/listarprod.php" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-book fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Listar Produtos</p>
				</div>
			</div>
		</a>
	</div>
</div>
<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="vendas/listarvendas.php" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">

					<i class="fa fa-money fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Listar Vendas</p>
				</div>
			</div>
		</a>
	</div>
</div>
<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>