<?php
      require_once 'head.php';
      require_once 'menu.php';
?>

<div class="container-fluid">
        <div class="row text-center carrossel">
            <div class="col-md-1"></div>
              <div class="col-md-10">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imagens/promocao.png" alt="Primeiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/fretegratis.png" alt="Segundo Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/veterinaria.png" alt="Terceiro Slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
</div>

<div class="container-fluid">
  <div class="row text-center titulo">
          <h1><i>Departamentos</i></h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row text-center servicos" >
      <div class="col-md-4">
        <img src="imagens/cachoro.jpg" class="img-fluid">
        <h4>Cachorro</h4>
      </div>

      <div class="col-md-4">
        <img src="imagens/gato.webp" class="img-fluid">
        <h4>Gatos</h4>
      </div>

      <div class="col-md-4">
        <img src="imagens/outrospets.webp" class="img-fluid">
        <h4>Outros Pets</h4>
      </div>
  </div>

    
  
    <div class="row text-center titulo">
          <h1><i>Serviços</i></h1>
    </div>
      
  
  <div class="row text-center servicos" >
      <div class="col-md-4">
        <img src="imagens/banhoetosa.png" class="img-fluid">
        <h4>Banho e Tosa</h4>
      </div>
  
      <div class="col-md-4">
        <img src="imagens/farmacia.jpg" class="img-fluid">
        <h4>Farmácia</h4>
      </div>
  
      <div class="col-md-4">
        <img src="imagens/veterinari.jpg" class="img-fluid">
        <h4>Veterinário</h4>
      </div>
   </div>
  
     
  </div>

    <?php
        require_once 'footer.php';
    ?>
