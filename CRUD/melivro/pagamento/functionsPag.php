<?php

require_once('../config.php');
require_once(DBAPI);

$pagamentos = null;
$pagamento = null;

/**
*    Listagem de pagamentos
*/
function indexPagamentos() {
	global $pagamentos;
	$pagamentos = findPagamentos_all('pagamento');
}


/**
 *  Cadastro de Pagamentos
 */
function addPagamento() {
  if (!empty($_POST['pagamento'])) {
    $pagamento = $_POST['pagamento'];  
    savePagamento('pagamento', $pagamento);
    header('location: index.php');
  }
}

/**
*  Insere um registro no BD
*/
function savePagamento($table = null, $data = null) {
  $database = open_database();

  if($table == 'pagamento'){

    $sql1 = "INSERT INTO pagamento (CODPAG, METODO_PAG, VALOR, CONCRETIZADO)
    VALUES ('{$data["'CODPAG'"]}','{$data["'METODO_PAG'"]}', '{$data["'VALOR'"]}', '{$data["'CONCRETIZADO'"]}')";
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
*   Visualização de um pagamento
*/

function viewPagamentos($id = null){
	global $pagamento;
	$pagamento = findPagamentos('pagamentos',$id);
}


/**
 *	Atualizacao/Edicao de Pagamento
 */
function editPagamento() {
  if (isset($_GET['id'])) {
	
    $id = $_GET['id'];
    if (isset($_POST['pagamento'])) {
      $pagamento = $_POST['pagamento'];
      updatePagamento('pagamento', $id, $pagamento);
      header('location: index.php');
    } else {
      global $pagamento;
      $pagamento = findPagamentos('pagamentos', $id);
    } 
  } else {
    header('location: index.php');
  }
}
/**
 *  Atualiza um registro em uma tabela, por ID
 */
function updatePagamento($table = null, $id = 0, $data = null) {
	$database = open_database();
	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql1 = "UPDATE pagamento SET CODPAG = '{$data["'codpag'"]}', VALOR = '{$data["'valor'"]}', CONCRETIZADO = '{$data["'concretizado'"]}', METODO_PAG = '{$data["'metodo_pag'"]}' WHERE pagamento.CODPAG =" . $id;
	$sql2 = "UPDATE pagamento SET CODPAG = '{$data["'codpag'"]}', VALOR = '{$data["'valor'"]}', CONCRETIZADO = '{$data["'concretizado'"]}', METODO_PAG = '{$data["'metodo_pag'"]}' WHERE pagamento.CODPAG =" . $id;	
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




/**
*  Pesquisa todos os registros de uma tabela
*/

function findPagamentos_all( $table ){
	return findPagamentos($table);
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function findPagamentos($table = null, $id = null){
  	$database = open_database();
	  $found = null;

  	if($table == 'pagamento'){
    	try{
    		$sql = "SELECT * FROM pagamento" ;
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
              $sql = "SELECT * FROM pagamento WHERE pagamento.CODPAG = " . $id;   	      	 
              $result = $database->query($sql);
    	    	if ($result->num_rows > 0) {
        	   		$found = $result->fetch_assoc();
        		}	
      		} else {
        
        	$sql = "SELECT * FROM pagamento WHERE pagamento.CODPAG = " . $id;
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
 *  Exclusão de um pagamento
 */
function deletePag($id = null){
	global $pagamento;
	$pagamento = removePag('pagamento',$id);
	header('location: index.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removePag( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
      $sql1 = "DELETE FROM pagamento WHERE pagamento.CODPAG = " . $id;
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
