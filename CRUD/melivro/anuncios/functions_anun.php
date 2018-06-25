<?php

require_once('../config.php');
require_once(DBAPI);

$anuncios = null;
$anuncio = null;

/**
 *  Listagem de Clientes
 */
function indexUser() {
  global $anuncios;
  $anuncios = findUser_all('anuncio');
}

/**
 *  Cadastro de Clientes
 */
function addUser() {
  if (!empty($_POST['anuncio'])) {
    $anuncio = $_POST['anuncio'];
    //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));    
    //$anuncio['modified'] = $anuncio['created'] = $today->format("Y-m-d H:i:s");
        
    saveUser('anuncio', $anuncio);
    header('location: index.php');
  }
}

/**
*  Insere um registro no BD
*/
function saveUser($table = null, $data = null) {
  $database = open_database();

  if($table == 'anuncio'){

    /*$sql1 = "INSERT INTO pessoa (NOME, CPF, EMAIL, SENHA, ADMIN)
    VALUES ('{$data["'nome'"]}','{$data["'cpf'"]}', '{$data["'email'"]}', '{$data["'senha'"]}', '0')";*/
    $sql1 = "INSERT INTO anuncio(CODANUNCIO, TIPO_PRODUTO, ATIVO, DATA_PUBLICACAO, CPF, CODPROD)
    VALUES ('null','{$data["'tipo_produto'"]}','1','{$data["'data_publicacao'"]}','{$data["'cpf'"]}','{$data["'codprod'"]}')";
    
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
 *  Visualização de um Cliente
 */
function viewUser($id = null) {
  global $anuncio;
  $anuncio = findUser('anuncios', $id);
}

/**
 *	Atualizacao/Edicao de Cliente
 */
function editUser() {
  if (isset($_GET['id'])) {
	
    $id = $_GET['id'];
    if (isset($_POST['anuncio'])) {
      $anuncio = $_POST['anuncio'];
      updateUser('anuncio', $id, $anuncio);
      header('location: index.php');
    } else {
      global $anuncio;
      $anuncio = findUser('anuncios', $id);
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
	 //$sql1 = "UPDATE pessoa SET NOME = '{$data["'nome'"]}', CPF = '{$data["'cpf'"]}', EMAIL = '{$data["'email'"]}', ADMIN = '0' WHERE pessoa.CPF =" . $id;
	
  $ql1 = "UPDATE anuncio SET CODANUNCIO='{$data["'codanuncio'"]}', TIPO_PRODUTO='{$data["'tipo_produto'"]}', ATIVO={$data["'ativo'"]}, DATA_PUBLICACAO={$data["'data_publicacao'"]},CPF={$data["'cpf'"]},CODPROD={$data["'codprod'"]} WHERE anuncio.CODANUNCIO =" .$id;

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

  if($table == 'anuncio'){
    try{
      $sql = "SELECT * FROM anuncio WHERE 1";
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
        $sql = "SELECT `CODANUNCIO`, `TIPO_PRODUTO`, `ATIVO`, `DATA_PUBLICACAO`, `CPF`, `CODPROD` FROM `anuncio` WHERE `CODANUNCIO` = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
        }
        
      } else {
        
        /*$sql = "SELECT pessoa.cpf,pessoa.NOME,pessoa.EMAIL,pessoa.ADMIN,anuncio.CIDADE, anuncio.ENDERECO, anuncio.TELEFONE, anuncio.SEXO FROM pessoa INNER JOIN anuncio ON pessoa.cpf=anuncio.cpf";
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
          
          /* Metodo alternativo
          $found = array();
          while ($row = $result->fetch_assoc()) {
            array_push($found, $row);
          }*/ 
        
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
 *  Exclusão de um Cliente
 */
function deleteUser($id = null) {
  global $anuncio;
  $anuncio = removeUser('anuncio', $id);
  header('location: index.php');
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function removeUser( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
      $sql1 = "DELETE FROM anuncio WHERE anuncio.CODANUNCIO = " . $id;
     // $sql2 = "DELETE FROM pessoa WHERE pessoa.CPF = " . $id;
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