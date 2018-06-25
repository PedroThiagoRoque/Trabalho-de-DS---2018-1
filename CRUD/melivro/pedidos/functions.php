<?php

require_once('../config.php');
require_once(DBAPI);

$pedidos = null;
$pedido = null;

/**
 *  Listagem de Pedidos
 */
function indexUser() {
  global $pedidos;
  $pedidos = findUser_all('pedido');
}

/**
 *  Cadastro de Pedidos
 */
function addUser() {
  if (!empty($_POST['pedido'])) {
    $pedido = $_POST['pedido'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    //$pedido['modified'] = $pedido['created'] = $today->format("Y-m-d H:i:s");



    saveUser('pedido', $pedido);
    header('location: index.php');
  }
}

/**
*  Insere um registro no BD
*/
function saveUser($table = null, $data = null) {
  $database = open_database();

  if($table == 'pedido'){
    $sql1 = "INSERT INTO pedido (CODPEDIDO, STATUS_PED, DATA_PEDIDO, CPF)
    VALUES ('{$data["'CODPEDIDO'"]}','{$data["'STATUS_PED'"]}', '{$data["'DATA_PEDIDO'"]}', '{$data["'CPF'"]}')";
    try {
      $database->query($sql1);
      $_SESSION['message'] = 'Registro cadastrado com sucesso.';
      $_SESSION['type'] = 'success';
    } catch (Exception $e) {
      $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
      $_SESSION['type'] = 'danger';
    }
}
  close_database($database);
}

/**
 *  Visualização de um pedido
 */
function viewUser($id = null) {
  global $pedido;
  $pedido = findUser('pedidos', $id);
}

/**
 *	Atualizacao/Edicao de pedido
 */
function editUser() {
  if (isset($_GET['id'])) {

    $id = $_GET['id'];
    if (isset($_POST['pedido'])) {
      $pedido = $_POST['pedido'];
      updateUser('pedido', $id, $pedido);
      header('location: index.php');
    } else {
      global $pedido;
      $pedido = findUser('pedidos', $id);
    }
  } else {
    header('location: index.php');
  }
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
function updateUser($table = null, $id = 0, $data = null) {
	$database = open_database();
	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql1 = "UPDATE pedido SET CPF = '{$data["'cpf'"]}', STATUS_PED = '{$data["'status_ped'"]}', DATA_PEDIDO = '{$data["'data_pedido'"]}', WHERE pedido.CODPEDIDO =" . $id;
	try {
		$database->query($sql1);
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) {
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	}
	close_database($database);
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findUser_all( $table ) {
  return findUser($table);
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findUser( $table = null, $id = null ) {
  $database = open_database();
$found = null;

  if($table == 'pedido'){
    try{
      $sql = "SELECT * FROM pedido";
      $result = $database->query($sql);
      if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
        }
    }catch (Exception $e) {
       $_SESSION['message'] = $e->GetMessage();
         $_SESSION['type'] = 'danger';
    }
 }else{
    try {
          if ($id) {
             $sql = "SELECT * FROM pedido WHERE pedido.CODPEDIDO = " . $id;
             $result = $database->query($sql);
          if ($result->num_rows > 0) {
              $found = $result->fetch_assoc();
          }
        } else {

        $sql = "SELECT * FROM pedido WHERE pedido.CODPEDIDO = " . $id;
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
        }
     }
     }catch (Exception $e) {
       $_SESSION['message'] = $e->GetMessage();
     $_SESSION['type'] = 'danger';
   }
}

close_database($database);
return $found;

}

/**
 *  Exclusão de um Cliente
 */
function deleteUser($id = null) {
  global $pedido;
  $pedido = removeUser('pedido', $id);
  header('location: index.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removeUser( $table = null, $id = null ) {
  $database = open_database();

  try {
    if ($id) {
      $sql1 = "DELETE FROM pedido WHERE pedido.CODPEDIDO = " . $id;
      //$result = $database->query($sql1);
      if ($result = $database->query($sql1)) {
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}

?>
