<?php

    session_start();
    ob_start();

    $_SESSION["quant"]+=1;

    require_once 'conexao.php';

    $cesta = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($cesta);
   
    $codproduto = $cesta["codproduto"];
    $quantcomprada = $cesta["quantcomprada"];

    $sql = "SELECT * from produto WHERE codproduto = $codproduto LIMIT 1";
    $resultado = $conn->prepare($sql);
    $resultado -> execute();

    if(($resultado) and ($resultado->rowCount()!=0)){
        $linha=$resultado->fetch(PDO::FETCH_ASSOC);
        extract($linha);
        
        $sql2="INSERT into carrinho(codproduto,nome,quantcomprada,preco,foto)
        values(:codproduto,:nome,:quantcomprada,:preco,:foto)";
        $salvar = $conn->prepare($sql2);
        $salvar->bindParam(':codproduto', $codproduto, PDO::PARAM_INT);
        $salvar->bindParam(':nome', $nome, PDO::PARAM_STR);
        $salvar->bindParam(':quantcomprada', $quantcomprada, PDO::PARAM_INT);
        $salvar->bindParam(':preco', $preco, PDO::PARAM_STR);
        $salvar->bindParam(':foto', $foto, PDO::PARAM_STR);
        $salvar->execute();


    } 

    $pag = $_SERVER['HTTP_REFERER'] ;
    header("Location:$pag");

?>