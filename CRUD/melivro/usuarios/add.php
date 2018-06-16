<?php 
  require_once('functions.php'); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Usuário</h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="usuario['nome']">
    </div>

    <div class="form-group col-md-3">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" name="usuario['cpf']">
    </div>

    <div class="form-group col-md-2">
      <label for="email">Email: </label>
      <input type="text" class="form-control" name="usuario['email']">
    </div>
  </div>  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="senha">Senha: </label>
      <input type="text" class="form-control" name="usuario['senha']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Cidade: </label>
      <input type="text" class="form-control" name="usuario['cidade']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Endereço: </label>
      <input type="text" class="form-control" name="usuario['endereco']">
    </div>
      
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Sexo: </label>
      <input type="text" class="form-control" name="usuario['sexo']">
    </div>
        
    <div class="form-group col-md-2">
      <label for="campo3">Telefone</label>
      <input type="text" class="form-control" name="usuario['telefone']">
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