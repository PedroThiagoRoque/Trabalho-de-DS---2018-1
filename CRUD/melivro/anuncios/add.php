<?php 
  require_once('functions_anun.php'); 
  addUser();
?>

<?php include(HEADER_TEMPLATE); ?>
 <body>
 	<hr>
	<hr>
    <div id = "conteudo">
    <h2 class="display-3"> Novo Anuncio </h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    
    <div class="form-group col-md-7">
      <label for="name">Tipo produto</label>
      <input type="text" class="form-control" name="anuncio['tipo_produto']" placeholder="Digite o tipo">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Data</label>
      <input type="text" class="form-control" name="anuncio['data_publicacao']" placeholder="Digite a data da publicacao" >
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">CPF</label>
      <input type="text" class="form-control" name="anuncio['cpf']" maxlength="15" placeholder="Digite seu cpf" maxlength="14"
    <div class="form-group col-md-7">
      <label for="campo1">Codigo produto</label>
      <input type="text" class="form-control" name="anuncio['codprod']" placeholder="Digite o codigo do produto">
    </div>

  </div>
    
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>
</body>

<?php include(FOOTER_TEMPLATE); ?>