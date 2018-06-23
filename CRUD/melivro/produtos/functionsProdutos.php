<?php

require_once('../config.php');
require_once(DBAPI);

$produtos = null;
$produto = null;

/**
 *  Listagem de Clientes
 */
function indexProdutos() {
  global $produtos;
  $produtos = findProdutos_all('produto');
}

/**
 *  Visualização de um Cliente
 */
function viewProdutos($id = null) {
  global $produto;
  $produto = findProdutos('produtos', $id);
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findProdutos_all( $table ) {
  return findProdutos($table);
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findProdutos( $table = null, $id = null ) {
  
	$database = open_database();
	$found = null;

  if($table == 'produto'){
    try{
		$sql = "SELECT * FROM produto";
		$result = $database->query($sql);
	    if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
      }
      //var_dump($found);die;

    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }
  }else{
    try {
      if ($id) {
        $sql = "SELECT * FROM produto WHERE produto.CODPROD = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
        }
        
      } else {
        
        $sql = "SELECT * FROM produto WHERE produto.CODPROD = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
        }
      }
    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }
  }
	
	close_database($database);
  return $found;
}

/**
 *	Atualizacao/Edicao de Cliente
 */
 /*
function editUser() {
  if (isset($_GET['id'])) {
	
    $id = $_GET['id'];
    if (isset($_POST['usuario'])) {
      $usuario = $_POST['usuario'];
      updateUser('usuario', $id, $usuario);
      header('location: index.php');
    } else {
      global $usuario;
      $usuario = findUser('usuarios', $id);
    } 
  } else {
    header('location: index.php');
  }
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
 /*
function updateUser($table = null, $id = 0, $data = null) {
	$database = open_database();
	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql1 = "UPDATE pessoa SET NOME = '{$data["'nome'"]}', CPF = '{$data["'cpf'"]}', EMAIL = '{$data["'email'"]}', ADMIN = '0' WHERE pessoa.CPF =" . $id;
		
	$sql2 = "UPDATE usuario SET CIDADE = '{$data["'cidade'"]}', ENDERECO = '{$data["'endereco'"]}', TELEFONE = '{$data["'telefone'"]}', SEXO = '{$data["'sexo'"]}', CPF = '{$data["'cpf'"]}' WHERE usuario.CPF =" . $id;
	try {
		$database->query($sql1);
		$database->query($sql2);
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';
	} catch (Exception $e) { 
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	} 
	close_database($database);
}
	*/

/**
 *  Exclusão de um Cliente
 */
 /*
function deleteProduto($id = null) {
  global $produto;
  $produto = removeProduto('produtos', $id);
  header('location: index.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
 /*
function removeUser( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
      $sql1 = "DELETE FROM usuario WHERE usuario.CPF = " . $id;
      $sql2 = "DELETE FROM pessoa WHERE pessoa.CPF = " . $id;
      //$result = $database->query($sql1);
      if ($result = $database->query($sql1)) {   	
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
	  if ($result = $database->query($sql2)) {   	
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
*/
?>