<?php

require_once('../config.php');
require_once(DBAPI);


$vendas = null;
$venda = null;

/**
 *  Listagem de Vendas
 */
function indexVendas() {
  global $vendas;
  $vendas = findVendas_all('venda');
}

/**
 *  Cadastro de Vendas
 */
function addVendas() {
  if (!empty($_POST['venda'])) {
    $venda = $_POST['venda'];

    saveVenda('venda', $venda);
    header('location: indexVendas.php');
  }
}

/**
*  Insere um registro no BD
*/
function saveVendas($table = null, $data = null) {
  $database = open_database();

  if($table == 'venda'){

    $sql1 = "INSERT INTO venda (CODPAG, CODVENDA, CPF, DATA_VENDA, VALOR_VENDA)
    VALUES ('{$data["'codpag'"]}','{$data["'codvenda'"]}', '{$data["'cpf'"]}', '{$data["'data'"]}', '{$data[valor]}')";


    try {
      $database->query($sql1);

      $_SESSION['message'] = 'Venda cadastrada com sucesso.';
      $_SESSION['type'] = 'success';

    } catch (Exception $e) {

      $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
      $_SESSION['type'] = 'danger';
    }
}
  close_database($database);
}

/**
 *	Atualizacao/Edicao de venda
 */
function editVendas() {
  if (isset($_GET['id'])) {

    $id = $_GET['id'];
    if (isset($_POST['venda'])) {
      $venda = $_POST['venda'];
      updateVendas('venda', $id, $venda);
      header('location: indexVendas.php');
    } else {
      global $vendas;
      $vendas = findVendas('venda', $id);
    }
  } else {
    header('location: indexVendas.php');
  }
}

function updateVendas($table = null, $id = 0, $data = null) {
	$database = open_database();
	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql1 = "UPDATE venda SET CODVENDA = '{$data["'codvenda'"]}', VALOR_VENDA = '{$data["'valor'"]}', DATA_VENDA = '{$data["'data'"]}', CPF = '{$data["'cpf'"]}', CODPAG = '{$data["'codpag'"]}'" . $id;

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
 *  Visualização de uma venda
 */
function viewVendas($id = null) {
  global $vendas;
  $vendas = findVendas('venda',$id);
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function findVendas_all( $table ) {
  return findVendas($table);
}


/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findVendas( $table = null, $id = null ) {

	$database = open_database();
	$found = null;
  if($table == 'venda'){
    try{
		$sql = "SELECT * FROM venda";
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
        $sql = "SELECT * FROM venda WHERE venda.CODVENDA = " . $id;
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
        }

      } else {

        $sql = "SELECT * FROM venda WHERE venda.CODVENDA = " . $id;
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
 *  Exclusão de uma venda
 */
function deleteVendas($id = null) {
  global $vendas;
  $vendas = removeVendas('venda', $id);
  header('location: indexVendas.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removeVendas( $table = null, $id = null ) {
  $database = open_database();

  try {
    if ($id) {
      $sql1 = "DELETE FROM venda WHERE venda.CODVENDA = " . $id;
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
