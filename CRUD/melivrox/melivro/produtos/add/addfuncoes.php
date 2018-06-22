<?php
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

function addRevista() {
  if (isset($_POST["submit"])) {
    $titulodarevista = $_POST['titulo'];
    $precodarevista = $_POST['preco'];
    $descricaodarevista = $_POST['descricao'];
    $imagemdarevista = $_POST['imagem'];

	$database = open_database();
	
	$sql1 = mysqli_query($database, "INSERT INTO produto (CODPROD, TITULO, PRECO, DESCRICAO, IMAGEM)
	VALUES (NULL, '$titulodarevista', '$precodarevista', '$descricaodarevista', '$imagemdarevista')")or die(mysql_error());

    $issndarevista = $_POST['issn'];
	$editoradarevista = $_POST['editora'];
	
	$sqlaux = mysqli_query($database, "SELECT CODPROD FROM produto WHERE produto.TITULO = '$titulodarevista'")or die(mysql_error());
	$codigoproduto = mysqli_fetch_array($sqlaux);
	$sql2 = mysqli_query($database, "INSERT INTO revista (ISSN, EDITORA, CODPROD) VALUES ('$issndarevista','$editoradarevista', '$codigoproduto[0]')")or die(mysql_error());
	
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
	  //close_database($database);
	  echo "<h1>".$contact['CODPROD']."</h1>";
    header('location: revista.php');
  }
}

?>