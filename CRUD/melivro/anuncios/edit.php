<?php 
  require_once('functions_anun.php'); 
  editUser();
?>

<?php include(HEADER_TEMPLATE); ?>
  <hr />
<h2>Atualizar Anuncio</h2>


<form action="edit.php?id=<?php echo $anuncio['CODANUNCIO'];?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Codigo Anuncio</label>
      <input type="text" class="form-control" name="anuncio['cod']" value="<?php echo $anuncio['CODANUNCIO'];?>">
    </div>

    <div class="form-group col-md-4">
      <label for="campo2">Tipo</label>
      <input type="text" class="form-control" name="anuncio['tipo']" maxlength="14"value="<?php echo $anuncio['TIPO_PRODUTO'];?>">
    </div>

  </div>
  <div class="row">
  
    
    
    <div class="form-group col-md-5">
      <label for="campo3">ATIVO</label>
      <input type="text" class="form-control" name="anuncio['ativo']" value="<?php echo $anuncio['ATIVO'];?>">
    </div>
	
	    <div class="form-group col-md-7">
      <label for="campo1">DATA PUBLICAÇÃO</label>
      <input type="text" class="form-control" name="anuncio['data']" value="<?php echo $anuncio['DATA_PUBLICACAO'];?>">
    </div>
  </div>
  
  <div class="row">
  
    <div class="form-group col-md-5">
      <label for="campo2">CPF</label>
      <input type="text" class="form-control" name="anuncio['cpf']"  value="<?php echo $anuncio['CPF'];?>">
    </div>
    <div class="form-group col-md-2">
        
    <div class="form-group col-md-5">
      <label for="campo2">CODIGO PRODUTO</label>
      <input type="text" class="form-control" name="anuncio['codprod']" value="<?php echo $anuncio['CODPROD'];?>">
      <br></br>
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