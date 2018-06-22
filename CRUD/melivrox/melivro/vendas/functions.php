<?php
require_once('../config.php');
require_once(DBAPI);
$vendas = null;
$venda = null;
/**
 *  Listagem de Vendas
 */
function index() {
  global $vendas;
  $vendas = find_all('venda');
}
/**
 *  Cadastro de Vendas
 */
function add() {
  if (!empty($_POST['venda'])) {
    $venda = $_POST['venda'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$venda['modified'] = $venda['created'] = $today->format("Y-m-d H:i:s");
    
    
    
    save('venda', $venda);
    header('location: index.php');
  }
}
/**
 *  Visualização de uma Venda
 */
function view($id = null) {
  global $venda;
  $venda = find('vendas', $id);
}
/**
 *  Exclusão de uma Venda
 */
function delete($id = null) {
  global $venda;
  $venda = remove('vendas', $id);
  header('location: index.php');
}