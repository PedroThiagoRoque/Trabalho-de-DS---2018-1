<?php

require_once('../config.php');
require_once(DBAPI);

$usuarioss = null;
$usuario = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $usuarios;
	$usuarios = find_all('usuarios');
}

/**
 *  Cadastro de Clientes
 */
function add() {

  if (!empty($_POST['usuario'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $usuario = $_POST['usuario'];
    $usuario['modified'] = $usuario['created'] = $today->format("Y-m-d H:i:s");
    
    save('usuarios', $usuario);
    header('location: index.php');
  }
}
