<?php

require_once('../config.php');
require_once(DBAPI);

$usuarios = null;
$usuario = null;

/**
 *  Listagem de Clientes
 */
function index() {
  global $usuarios;
  $usuarios = find_all('usuario');
}

/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$usuario['modified'] = $usuario['created'] = $today->format("Y-m-d H:i:s");
    
    
    
    save('usuario', $usuario);
    header('location: index.php');
  }
}

/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $usuario;
  $usuario = find('usuarios', $id);
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $usuario;
  $usuario = remove('usuarios', $id);
  header('location: index.php');
}

