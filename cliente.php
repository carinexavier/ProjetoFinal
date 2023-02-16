<?php
    require_once 'head.php';  	
    include_once 'conexao.php';
    session_start();
	ob_start();
?>

<body class="bodycli">
    
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand mb-0 h1" href="#">
    <img src="imagens/withlovevazado.png" width="40" height="40" class="d-inline-block align-top">
    Área do Cliente
  </a>
    <a class="nav-link" href="index.php">Home</a>
    <a class="nav-link" href="sair.php"><u>Sair</u></a>
</nav>


<?php
    echo "Bem vindo(a) " . $_SESSION['nome'];
    if(!isset($_SESSION['nome'])){
       $_SESSION['msg'] = "Erro: Necessário realizar o login para acessar a página!";
       header("Location: login.php");
    }
?>

<div class="container clic">
    <div class="row">
        <div class="col-md-6 text-center">
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">Cadastre seu Pet!</li>
                <a href="frmpet.php" class="list-group-item list-group-item-action">Pet</a>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">Agende um dos nossos serviços!</li>
                <a href="frmservico.php" class="list-group-item list-group-item-action">agendamento</a>
            </ul>
        </div>
    </div>
</div>
</body>