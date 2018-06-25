<?php
  require_once('functionsVendas.php');
  editVendas();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Venda</h2>


<form action="editVendas.php?id=<?php echo $venda['CODVENDA'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
<!--  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Código</label>
      <input type="text" class="form-control" name="venda['codvenda']" value="
    </div>
-->

  <div class="row">
    <div class="form-group col-md-4">
      <label for="campo2">Valor</label>
      <input type="text" class="form-control" name="venda['valor']" maxlength="14"value="<?php echo $venda['VALOR_VENDA'];?>">
    </div>


  <!-- <div class="row"> -->

    <div class="form-group col-md-5">
      <label for="campo3">Data</label>
      <input type="text" class="form-control" name="venda['data']" value="<?php echo $venda['DATA_VENDA'];?>">
    </div>
</div>
<div class="row">
	    <div class="form-group col-md-7">
      <label for="campo1">CPF</label>
        <input type="text" class="form-control" name="venda['cpf']" value="<?php echo $venda['CPF'];?>">
    </div>
  </div>

<!--  <div class="row">

    <div class="form-group col-md-5">
      <label for="campo2">Código de pagamento</label>
      <input type="text" class="form-control" name="venda['codpag']"  value="
  </div>
-->
      <br></br>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
