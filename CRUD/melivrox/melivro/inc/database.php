<?php
mysqli_report(MYSQLI_REPORT_STRICT);
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}
function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null ) {

	$database = open_database();
	$found = null;

  if($table == 'usuario'){
    try{
      $sql = "SELECT * FROM pessoa INNER JOIN usuario ON pessoa.cpf=usuario.cpf";
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
        $sql = "SELECT * FROM (
		SELECT pessoa.cpf,pessoa.NOME,pessoa.EMAIL,pessoa.ADMIN,usuario.CIDADE, usuario.ENDERECO, usuario.TELEFONE, usuario.SEXO FROM pessoa INNER JOIN usuario ON pessoa.cpf=usuario.cpf
		) AS subquery WHERE subquery.cpf = " . $id;
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
        }

      } else {

        $sql = "SELECT * FROM " . $table;
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);

          /* Metodo alternativo
          $found = array();
          while ($row = $result->fetch_assoc()) {
            array_push($found, $row);
          } */
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
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all( $table ) {
  return find($table);
}

/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {
  $database = open_database();

  if($table == 'usuario'){

    $sql1 = "INSERT INTO pessoa (NOME, CPF, EMAIL, SENHA, ADMIN)
    VALUES ('{$data["'nome'"]}','{$data["'cpf'"]}', '{$data["'email'"]}', '{$data["'senha'"]}', '0')";

    $sql2 = "INSERT INTO usuario (CIDADE, ENDERECO, TELEFONE, SEXO, CPF)
    VALUES ('{$data["'cidade'"]}','{$data["'endereco'"]}', '{$data["'telefone'"]}', '{$data["'sexo'"]}', '{$data["'cpf'"]}')";
    //var_dump($sql2);die;
    try {
      $database->query($sql1);
      $database->query($sql2);

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
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['usuario'])) {

      $usuario = $_POST['usuario'];
      $usuario['modified'] = $now->format("Y-m-d H:i:s");

      update('usuarios', $id, $usuario);
      header('location: index.php');
    } else {

      global $usuario;
      $usuario = find('usuarios', $id);
    }
  } else {
    header('location: index.php');
  }
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove( $table = null, $id = null ) {
  $database = open_database();

  try {
    if ($id) {
      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      if ($result = $database->query($sql)) {
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
