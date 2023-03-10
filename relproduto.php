<?php

    require_once 'conexao.php';
    require_once 'head.php';


    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 6;

    $inicio = ($limitereg * $pag) - $limitereg;




    $busca = "SELECT  p.codproduto,p.nome,p.quantidade,p.marca,p.foto,
    p.preco,c.nomecategoria FROM produto p,categoria c
    WHERE c.idcategoria = p.idcategoria and p.quantidade > 0
    LIMIT $inicio , $limitereg";         

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>

<body style="background-color: #e3f2fd;">  

    <h1 class="text-center">Produtos em Estoque</h1>

            <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Imagem</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        </tr>
                    </thead>
            <tbody>

<?php
        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
           // var_dump($linha);
            extract($linha);
            ?>
                    
                        <tr>
                            <td><img src="<?php echo $foto; ?>" style=width:150px;height:150px;></td>
                            <td><?php echo $codproduto; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $preco; ?></td>
                            <td><?php echo $quantidade; ?></td>
                            <td><?php echo $marca; ?></td>
                            <td><?php echo $nomecategoria; ?></td>
                        </tr>
                        
                   
    <?php
        }
    ?>

        </tbody>
        </table>

<?php

    }

    $qtregistro = "SELECT COUNT(codproduto) AS registros FROM produto WHERE quantidade > 0";
    $resultado = $conn->prepare($qtregistro);
    $resultado->execute();
    $resposta = $resultado->fetch(PDO::FETCH_ASSOC);

    $qnt_pagina = ceil($resposta['registros'] / $limitereg);  
    
    $maximo = 2;

     echo "<a href='relproduto.php?page=1'>Primeira</a> ";
 
   for ($anterior = $pag - $maximo; $anterior <= $pag - 1; $anterior++) {
       if ($anterior >= 1) {
           echo "  <a href='relproduto.php?page=$anterior'>$anterior</a> ";
       }
   }

   echo "$pag";

   for ($proxima = $pag + 1; $proxima <= $pag + $maximo; $proxima++) {
       if ($proxima <= $qnt_pagina) {
           echo "<a href='relproduto.php?page=$proxima'>$proxima</a> ";
       }
   }

   echo "<a href='relproduto.php?page=$qnt_pagina'>Última</a> ";

?>

</body>