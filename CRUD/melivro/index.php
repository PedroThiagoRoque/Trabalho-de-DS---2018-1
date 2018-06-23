<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<hr>
<hr>
<h1>Ultimos produtos cadastrados</h1>
<hr />

<?php if (!$db) : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>