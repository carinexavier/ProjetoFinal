<?php
    require_once 'head.php';
    require_once 'menu.php';
    require_once 'conexao.php';
?>

<div class="container-fluid titulobt">
    <div class="row">
        <div class="col-md-12">
            <h1>Procedimentos oferecidos:</h1>
        </div>
    </div>
</div>

<div class="container bt">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 17rem;">
                <img class="card-img-top" src="imagens/banho.webp" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Banho</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 17rem;">
                <img class="card-img-top" src="imagens/tosa.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Tosa</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 17rem;">
                <img class="card-img-top" src="imagens/estetica.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Estética</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card" style="width: 17rem;">
                <img class="card-img-top" src="imagens/vet.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Veterinário</b></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center agd">
    <div class="row">    
        <div class="col-md-12">
            <h4>Faça login para fazer o agendamento para o seu pet!</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="login.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login</a>
        </div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>