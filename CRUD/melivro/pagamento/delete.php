<?php 
  require_once('functionsPag.php'); 
  if (isset($_GET['id'])){
    deletePag($_GET['id']);
  } else {
    die("ERRO: ID não definido.");
  }
?>