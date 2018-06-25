<?php require_once(functionsVendas.php)
if (isset($_GET['id'])){
  deleteVendas($_GET['id']);
} else {
  die("ERRO: ID não definido.");
}
?>
