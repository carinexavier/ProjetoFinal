<?php
    require_once 'head.php';  	
    include_once 'conexao.php';
    session_start();
	ob_start();
?>

<body class="bodyadm">
    
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand mb-0 h1" href="#">
    <img src="imagens/withlovevazado.png" width="40" height="40" class="d-inline-block align-top">
    Área Administrativa
  </a>
    <a class="nav-link" href="index.php">Home</a>
    <a class="nav-link" href="sair.php"><u>Sair</u></a>
</nav>


<?php
    echo "Bem vindo(a) " . $_SESSION['nome'];
    if(!isset($_SESSION['nome'])){
       $_SESSION['msg'] = "Erro: Necessário realizar o login para acessar a página!";
       header("Location: admlogin.php");
    }
?>

<div class="container admc">
    <div class="row">
        <div class="col-md-6 text-center">
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">Cadastros</li>
                <a href="frmcliente.php" class="list-group-item list-group-item-action">Clientes</a>
                <a href="frmfuncionario.php" class="list-group-item list-group-item-action">Funcionário</a>
                <a href="frmproduto.php" class="list-group-item list-group-item-action">Produtos</a>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning">Relatórios</li>
                <a href="relcliente.php" class="list-group-item list-group-item-action">Clientes</a>
                <a href="relfuncionario.php" class="list-group-item list-group-item-action">Funcionário</a>
                <a href="relproduto.php" class="list-group-item list-group-item-action">Produtos</a>
            </ul>
        </div>
    </div>
</div>
</body>