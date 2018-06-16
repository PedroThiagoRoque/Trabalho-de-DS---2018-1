<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Cliente</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="usuario['nome']" >
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="usuario['cpf']">
    </div>

    <div class="form-group col-md-4">
      <label for="campo3">Senha</label>
      <input type="text" class="form-control" name="usuario['senha']">
    </div>
    <div class="form-group col-md-7">
      <label for="campo1">Endereço</label>
      <input type="text" class="form-control" name="usuario['address']">
    </div>

  </div>
  
  <div class="row">
    
    <div class="form-group col-md-5">
      <label for="campo2">Email</label>
      <input type="text" class="form-control" name="usuario['hood']">
    </div>
    
    
    <div class="form-group col-md-5">
      <label for="campo3">Cidade</label>
      <input type="text" class="form-control" name="usuario['zip_code']">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-1">
      <label for="campo1">Sexo</label>
      <input type="text" class="form-control" name="usuario['city']">
    </div>
    
    <div class="form-group col-md-5">
      <label for="campo2">Telefone</label>
      <input type="text" class="form-control" name="usuario['phone']">
    </div>     
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>