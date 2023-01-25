<?php
    require_once 'head.php';
    require_once 'menu.php';
?>

<div class="container-fluid">
    <div class="row text-center" >
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <img src="imagens/banho.webp" class="img-fluid">
            <div class="card-body">
            <p class="card-text"><b>Banho</b></p>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <img src="imagens/tosa.jpg" class="img-fluid">
        <div class="card-body">
        <p class="card-text"><b>Tosa</b></p>
        </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <img src="imagens/estetica.jpg" class="img-fluid">
        <div class="card-body">
        <p class="card-text"><b>Estética</b></p>
        </div>
        </div>
        </div>
    </div>
</div>

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12 text-center">     
             <h3>Agende o procedimento para o seu pet!</h3>
        </div>
    </div>

<form>
  
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">   
        </div>
    </div>

  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" name="telefone">
  </div>

  
  <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">                   
                </div>
            </div>


<?php
    require_once 'footer.php';
?>