<?php 
  require_once('functions.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2 class="display-3">Atualizar Cliente <?php echo $usuario['NOME']; ?></h2>

<form action="edit.php?id=<?php echo $usuario['cpf'] ?>" method="post">
  <div class="form-group row">
  <div class="col">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['NOME']; ?>"  >
    </div>
  </div>
  <div class="col">
    <label for="staticpass" class="col-sm-2 col-form-label">CPF</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['cpf']; ?>"  >
    </div>
  </div>
  <div class="col">
    <label for="staticEmail" class="col-sm-2 col-form-label">Sexo</label>
    <div class="col-sm-10">
      <?php if($usuario['SEXO'] == 'f'){ ?>
        <input class="form-control" type="text" value ="Feminino"  >
      <?php } else { ?>
        <input class="form-control" type="text" value ="Masculino"  >
      <?php }?> 
    </div>
  </div>
  </div>
  <div class="form-group row">
  <div class="col">
    <label for="staticpass" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['EMAIL']; ?>"  >
    </div>
  </div>
  <div class="col">
    <label for="staticpass" class="col-sm-2 col-form-label">Telefone</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['TELEFONE']; ?>"  >
    </div>
  </div>
  </div>
  <div class="form-group row">
  <div class="col">
    <label for="staticpass" class="col-sm-2 col-form-label">Endereço</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['ENDERECO']; ?>"  >
    </div>
  </div>
  <div class="col">
    <label for="staticpass" class="col-sm-2 col-form-label">Cidade</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" value ="<?php echo $usuario['CIDADE']; ?>"  >
    </div>
  </div>
  </div>
</form>



  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>om

<!-- <form action="edit.php?id=<?php echo $usuario['cpf'] ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text" class="form-control" name="customer['name']" value="<?php echo $usuario['NOME'];; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CNPJ / CPF</label>
      <input type="text" class="form-control" name="customer['cpf_cnpj']" value="<?php echo $usuario['cpf']; ?>">
    </div>

  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Endereço</label>
      <input type="text" class="form-control" name="customer['address']" value="<?php echo $customer['address']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" class="form-control" name="customer['hood']" value="<?php echo $customer['hood']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">CEP</label>
      <input type="text" class="form-control" name="customer['zip_code']" value="<?php echo $customer['zip_code']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="customer['created']" disabled value="<?php echo $customer['created']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Município</label>
      <input type="text" class="form-control" name="customer['city']" value="<?php echo $customer['city']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">Telefone</label>
      <input type="text" class="form-control" name="customer['phone']" value="<?php echo $customer['phone']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Celular</label>
      <input type="text" class="form-control" name="customer['mobile']" value="<?php echo $customer['mobile']; ?>">
    </div>

    <div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" class="form-control" name="customer['state']" value="<?php echo $customer['state']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" class="form-control" name="customer['ie']" value="<?php echo $customer['ie']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">UF</label>
      <input type="text" class="form-control">
    </div>
  </div> -->