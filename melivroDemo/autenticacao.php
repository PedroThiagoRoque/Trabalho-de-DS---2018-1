<?php
	require_once('config.php');
	require_once(DBAPI);
?>

<html>

<head>

<title> Autenticando usuário </title>
<script type="text/javascript">
function loginSucesso(){
	setTimeout("window.location='html/menuPrincipal.html'", 3000);
}

function loginFail(){
	setTimeout("window.location='html/telalogin.html'", 3000)
}
</script>
</head>

<body>
<?php

	$database = open_database();
	// Recupera o login 
	$cpf = isset($_POST["cpf"]) ? addslashes(trim($_POST["cpf"])) : FALSE; 
	// Recupera a senha, a criptografando em MD5 
	#$senha = isset($_POST["pass"]) ? md5(trim($_POST["pass"])) : FALSE; 
	$senha = isset($_POST["pass"]) ? addslashes(trim($_POST["pass"])) : FALSE; 

	echo "<h1>".$cpf."</h1> + <h1>".$senha."</h1>";

	if(!$cpf || !$senha) 
	{ 
		echo "Você deve digitar sua senha e cpf!"; 
		exit; 
} 

	
	$sql = mysqli_query($database, "SELECT * FROM pessoa WHERE cpf = '$cpf' and senha = '$senha'") or die (mysqli_error());
	$row = mysqli_num_rows($sql); 
	
	if($row != 0){	
		
		$_SESSION["cpf"]=$_POST["cpf"];
		$_SESSION["senha"]=$_POST["pass"];
		echo "login realizado com sucesso";
		echo "<script>loginSucesso()</script>";
		#session_start("jksfewhKJHiuusrfsklkhjpfsoekçkKJHhodiwIYGF");
		#$_SESSION[jksfewhKJHiuusrfsklkhjpfsoekçkKJHhodiwIYGF] = $l;
		//header("Location: index.php");
		//exit;
	}
	else {

		// APENAS PARA TESTE
		echo " Nome de usuário ou senha inválido";
		echo "<script>loginFail()</script>";
		#header("Location:..//telalogin.php?action=fail");
	 };
?>
</body>
	
