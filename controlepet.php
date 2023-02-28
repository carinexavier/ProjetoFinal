<?php
include_once 'conexao.php';
session_start();
ob_start();


$dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//var_dump($dadoscad);

$cpf = $_SESSION['cpf'];

if(!empty($dadoscad["btncad"])){
           
    var_dump($dadoscad);

    $vazio = false;
    $dadoscad = array_map('trim', $dadoscad);
       
    if (in_array("", $dadoscad)) {
        $vazio = true;
               
        echo "<script>
        alert('Preencher todos os campos!');
        parent.location = 'frmpet.php';
        </script>";
    } 

        $sql = "insert into pet(nomepet,raca,cor,idade,cpf)values
        (:nome,:raca,:cor,:idade,:cpf)";

      	$salvar= $conn->prepare($sql);
        $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
        $salvar->bindParam(':raca', $dadoscad['raca'], PDO::PARAM_STR);
        $salvar->bindParam(':cor', $dadoscad['cor'], PDO::PARAM_STR);
        $salvar->bindParam(':idade', $dadoscad['idade'], PDO::PARAM_STR);
        $salvar->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Pet cadastrado com Sucesso!');
                parent.location = 'frmpet.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Pet não cadastrado!');
                parent.location = 'frmpet.php';
                </script>";
            }
}

?>