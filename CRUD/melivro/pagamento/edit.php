<?php 
  require_once('functionsPag.php'); 
  editPagamento();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Pagamento</h2>


<form action="edit.php?id=<?php echo $pagamento['codpag'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Metodo de Pagamento</label>
      <select type="text" class="form-control" placeholder="Metodo de Pagamento" name="pagamento['metodo_pag']">
         <option value="cartão">Cartão</option>
         <option value="debito">Boleto</option>
         <option value="paypal">Paypal</option>
         <option value="transferencia">Transferencia bancária</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Valor</label>
      <input type="number" class="form-control" name="pagamento['valor']" placeholder="Valor" min="1" value="<?php echo $pagamento['VALOR'];?>">
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

<?php include(FOOTER_TEMPLATE); ?>