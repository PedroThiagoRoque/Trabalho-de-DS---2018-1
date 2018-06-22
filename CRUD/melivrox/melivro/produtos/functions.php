<?php

require_once('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

/**
 *  Listagem de Clientes
 */
function index() {
  global $produtos;
  $produtos = find_all('produto');
}

/**
 *  Cadastro de Clientes
 */
function addProduto() {
  if (!empty($_POST['produto'])) {
    $produto = $_POST['produto'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$produto['modified'] = $produto['created'] = $today->format("Y-m-d H:i:s");
    
    
    
    save('produto', $produto);
    header('location: index.php');
  }
}

/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $produto;
  $produto = find('produtos', $id);
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $produto;
  $produto = remove('produtos', $id);
  header('location: index.php');
}

