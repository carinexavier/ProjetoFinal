<?php
    require_once 'head.php';  
	
	include_once 'conexao.php';

	session_start();
	ob_start();

  ?>

  <?php

	//echo "senha".password_hash(123, PASSWORD_DEFAULT);

	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if(!empty($dados["btnlogin"])){
			var_dump($dados);

			$sql = "SELECT matricula, nome, email, senha 
                        FROM funcionario 
                        WHERE email =:usuario  
                        LIMIT 1";
        	$resultado= $conn->prepare($sql);

			$resultado->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
       		
			$resultado->execute();

			if(($resultado) AND ($resultado->rowCount() != 0)){
				$linha = $resultado->fetch(PDO::FETCH_ASSOC);
				//var_dump($linha);

				if(password_verify($dados['senha'], $linha['senha'])){
					$_SESSION['nomeadm'] = $linha['nome'];
				
						header("Location:administrativo.php");
				
				}
				else{
					$_SESSION['msg'] = "Usuário ou Senha não encontrados";
				}


			}			
			else{
				$_SESSION['msg'] = "Usuário ou Senha não encontrados";
			}



		}

		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		

	?>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="imagens/faviconcut.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="usuario" class="form-control" placeholder="Usuário">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="senha" class="form-control" placeholder="Senha">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 			<input type="submit" value="Entrar" class="btn login_btn" name="btnlogin">
				   		</div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Não tem uma conta? <a href="frmfuncionario.php" class="ml-2">Cadastre-se</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
</body>
</html>

