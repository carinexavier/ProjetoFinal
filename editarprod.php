<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $id = filter_input(INPUT_GET, "codproduto", FILTER_SANITIZE_NUMBER_INT);

    $busca = "SELECT * from produto where codproduto = $id LIMIT 1";

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
        $linha = $resultado->fetch(PDO::FETCH_ASSOC);
     
        extract($linha);
    }
    else{
        $_SESSION['msg'] = "Produto não encontrado!";
        header("Location : relprodutos.php");
    }


?>

<form method="POST" action="controleproduto.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Controle de Produtos</h3>
                </div>
        </div>

        <div class="row">
                <div class="col-md-12 text-center">
                   <img src="<?php echo $foto; ?>" style=width:150px;height:150px;>
                </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <label for="codproduto">Código do Produto</label>
                    <input type="text" class="form-control" name="codproduto" 
                        value="<?php echo $codproduto; ?>"                    
                    >    
                </div>
            </div>           

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" 
                    value="<?php echo $nome; ?>"   
                    >    
                </div>
            </div>           

            <div class="col-md-3">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" class="form-control"
                        value="<?php echo $marca; ?>"   
                    >
                </div>
            </div>

             <div class="col-md-2">        
                <div class="form-group">            
                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade" class="form-control"
                     value="<?php echo $quantidade; ?>"   
                    >
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco"
                         value="<?php echo $preco; ?>"   
                    >
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria"
                    value="<?php echo $nomecategoria; ?>"   
                    >
                </div>
            </div>

            <div class="col-md-4">
                 <div class="form-group">
                     <label for="foto">Foto</label><p>
                    <input type="file" class="form-control" name="foto">
                </div>    
            </div>
        </div>

            
        <div class="row">   
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enviar" name="editarprod">
                </div>  
            </div>
        </div>
    </div>
  
</form>

<?php
require_once 'footeradm.php';

?>