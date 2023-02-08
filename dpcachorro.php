<?php
    require_once 'head.php';
    require_once 'menu.php';
    require_once 'conexao.php';

    $sql = "SELECT * FROM `produto` WHERE `idcategoria` = '2';";
    $resultado = $conn->prepare($sql);
    $resultado -> execute();
    
    if(($resultado) and ($resultado->rowCount()!=0)){      
    
?>

<div class="container-fluid titulodog">
    <div class="row">
        <div class="col-md-12">
            <h1>Produtos para seu cachorro</h1>
        </div>
    </div>
</div>

<div class="container dog">
    <div class="row">
    <?php       
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {           
            extract($linha);                          
    ?>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $foto; ?>" class="card-img-top" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $nome; ?></h5>
                <p class="card-text">R$<?php echo $preco; ?></p>
                <form action="carrinho.php" method="post">
                    <h6><label>Quant</label>
                    <input type="number" name="quantcomprada" value="1" style=width:50px;></h6>
                    <input type="hidden" name="codproduto" value="<?php echo $codproduto;?>">
                <input type="submit" class="btn btn-primary" value="Comprar">
                </form>
            </div>
        </div>
        </div>
        <?php
        }
    }
    ?>

    </div>
</div>

<?php
    require_once 'footer.php';
?>