<?php 
  require_once('functionsPag.php'); 
  addPagamento();
?>

<?php include(HEADER_TEMPLATE); ?>
 <body>
 	<hr>
	<hr>
    <div id = "conteudo">
    <h2 class="display-3"> Realizar Pagamento </h2>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
     <div class="form-group col-md-4">
      <label for="campo1">ID</label>
      <input type="number" class="form-control" name="pagamento['CODPAG']" placeholder="ID" min = "1">
    </div>
    <div class="form-group col-md-7">
      <label for="name">Metodo de Pagamento</label>
      <select type="text" class="form-control" placeholder="Metodo de Pagamento" name="pagamento['METODO_PAG']">
        <option value="Cartão">Cartão</option>
        <option value="Debito">Boleto</option>
        <option value="Paypal">PayPal</option>
        <option value="Transferência">Transferência Bancária</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Valor</label>
      <input type="number" class="form-control" name="pagamento['VALOR']" placeholder="Valor" step=".01"  min="1">
    </div>
     <div class="form-group col-md-4">
      <label for="campo2">Concretizado</label>
      <input type="bool" class="form-control" name="pagamento['CONCRETIZADO']" placeholder="True/False" >
    </div>
   </div>
  <div class="row">
   
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
