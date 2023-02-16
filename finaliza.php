<?php
    session_start();
    ob_start();

    include_once 'conexao.php';

      
    if(isset($_POST["excluir"])){
        $codproduto = $_POST["excluir"];

            $sqlexcluir = "DELETE from carrinho where codproduto = $codproduto";
            $resulbusca = $conn->prepare($sqlexcluir);
            $resulbusca->execute();

            $_SESSION["quant"]-=1;
    }
    else{
        if(!isset($_SESSION["nome"])){
            $_SESSION["carrinho"]=true;
            echo "<script>
                alert('Faça Login ou Cadastre-se!');
                parent.location = 'login.php';
                </script>";
        }
        else{
            //fazer pagamento

            echo "já estou logado agora tenho que pagar";

            $data = date('y-m-d');
            $valor = $_SESSION["totalgeral"];            
            $cpf = $_SESSION["cpf"];
          
            $sqlvenda = "INSERT into venda(data,valor,cpf)values
            (:data,:valor,:cpf)";
            $salvarvenda= $conn->prepare($sqlvenda);
            $salvarvenda->bindParam(':data', $data, PDO::PARAM_STR);
            $salvarvenda->bindParam(':valor', $valor, PDO::PARAM_STR);
            $salvarvenda->bindParam(':cpf', $cpf, PDO::PARAM_STR);        
            $salvarvenda->execute();

            $venda = "Select LAST_INSERT_ID()";
            $resulvenda=$conn->prepare($venda);
            $resulvenda->execute();

            $linhavenda = $resulvenda->fetch(PDO::FETCH_ASSOC);     
           
            $idvenda = ($linhavenda["LAST_INSERT_ID()"]);

             $busca = "select * from carrinho";
             $resulbusca=$conn->prepare($busca);
             $resulbusca->execute();

              if(($resulbusca) and ($resulbusca->rowCount()!=0)){
                while ($linha = $resulbusca->fetch(PDO::FETCH_ASSOC)) {
                extract($linha);
                var_dump($linha);

               $sqlitem = "insert into item(codproduto,idvenda,quantidade,valor)
                values(:codproduto,:idvenda,:quantidade,:valor)";
                $salvaritem= $conn->prepare($sqlitem);
                $salvaritem->bindParam(':codproduto', $codproduto, PDO::PARAM_INT);
                $salvaritem->bindParam(':idvenda', $idvenda, PDO::PARAM_INT);
                $salvaritem->bindParam(':quantidade', $quantcomprada, PDO::PARAM_INT);
                $salvaritem->bindParam(':valor', $preco, PDO::PARAM_STR);
                $salvaritem->execute();

                $estoque = "UPDATE produto set quantidade=(quantidade - $quantcomprada)
				where codproduto = $codproduto";
				$atualiza=$conn->prepare($estoque);
				$atualiza->execute();
            }


        }

        $sqllimpa = "delete from carrinho";
    $limpa= $conn->prepare($sqllimpa);
    $limpa->execute();
    $_SESSION["quant"] = 0;                                                                      


    header("Location:index.php");

    }

}  

?>