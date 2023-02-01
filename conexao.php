<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "withlove";
	$port = 3306;
	
try{
	$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
		//echo "Conexão com banco de dados realizados com sucesso!";
}catch (PDOException $erro) {
		echo "Erro: Conexão com banco de dados não realizada." .$erro;
	}

?>