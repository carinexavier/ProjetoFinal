<?php
  
  session_start();
  ob_start();

  if(!isset($_SESSION["quant"])){
    $_SESSION["quant"]=0;
  }
?>

<nav class="navbar navbar-expand-lg" style="background-color: #F0E68C;">
  <a class="navbar-brand" href="index.php"><img src="imagens/withlovevazado.png" width="100" height="100" alt=""></a>
    <button class="navbar-toggler navbar-light bg-light"  type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
      
  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Serviços</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="procofe.php">Procedimentos Oferecidos</a>
        <a class="dropdown-item" href="farmacia.php">Farmácia</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="dpcachorro.php">Cachorros</a>
        <a class="dropdown-item" href="dpgatos.php">Gatos</a>
        <a class="dropdown-item" href="dppets.php">Outros Pets</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="promocoes.php">Promoções</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Entrar <i class="fa-regular fa-circle-user"></i></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="frmcarrinho.php">
      <i class="fa-solid fa-cart-shopping" style=font-size:30px;></i></a>
      <?php
        if($_SESSION["quant"]>0){
        echo $_SESSION["quant"];}
      ?>
    </form>
  </div>
</nav>