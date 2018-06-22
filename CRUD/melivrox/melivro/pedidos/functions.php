<?php
require_once('../config.php');
require_once(DBAPI);
$pedidos = null;
$pedido = null;
/**
 *  Listagem de Clientes
 */
function index() {
  global $pedidos;
  $pedidos = find_all('pedido');
}
/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['pedido'])) {
    $pedido = $_POST['pedido'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$pedido['modified'] = $pedido['created'] = $today->format("Y-m-d H:i:s");
    
    
    
    save('pedido', $pedido);
    header('location: index.php');
  }
}
/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $pedido;
  $pedido = find('pedidos', $id);
}
/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $pedido;
  $pedido = remove('pedidos', $id);
  header('location: index.php');
}