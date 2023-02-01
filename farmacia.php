<?php
    require_once 'head.php';
    require_once 'menu.php';
    require_once 'conexao.php';
?>

<div class="container-fluid titulofarm">
    <div class="row">
        <div class="col-md-12">
            <h1>Farmácia</h1>
        </div>
    </div>
</div>

<div class="container farm">
    <div class="row">
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/antishampoo.webp" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Shampoo antipulgas</h5>
                <p class="card-text">R$19,98</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/antitablete.webp" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Antipulgas em tablete</h5>
                <p class="card-text">R$59,97</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/supaminomix.webp" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Suplemento aminomix</h5>
                <p class="card-text">R$34,99</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container farm">
    <div class="row">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/supglicopam.webp" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Suplemento glicopam pet</h5>
                <p class="card-text">R$33,99</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/vermicao.jpg" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Vermifugo para cachorro</h5>
                <p class="card-text">R$79,99</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="imagens/vermigato.webp" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Vermifugo para gato</h5>
                <p class="card-text">R$49,98</p>
                <a href="#" class="btn btn-primary">Comprar</a>
            </div>
        </div>
        </div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>