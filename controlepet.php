<?php
include_once 'conexao.php';

$dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dadoscad);

if(!empty($dadoscad["btncad"])){
           
    // var_dump($dadoscad);

    $vazio = false;
    $dadoscad = array_map('trim', $dadoscad);
        if (in_array("", $dadoscad)) {
        $vazio = true;
               
        echo "<script>
        alert('Preencher todos os campos!');
        parent.location = 'frmpet.php';
        </script>";
        } 

        $sql = "insert into pet(nomepet,raca,cor,idade)values
        (:nome,:raca,:cor,:idade)";

      	$salvar= $conn->prepare($sql);
        $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
        $salvar->bindParam(':raca', $dadoscad['raca'], PDO::PARAM_STR);
        $salvar->bindParam(':cor', $dadoscad['cor'], PDO::PARAM_STR);
        $salvar->bindParam(':idade', $dadoscad['idade'], PDO::PARAM_STR);
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

/*    
    if(!empty($dadoscad["btneditar"])){
           
        // var_dump($dadoscad);

        $dadoscad = array_map('trim', $dadoscad);

        if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
             $vazio = true;
             echo "<script>
             alert('Informe um email válido!');
             parent.location = 'frmcliente.php';
             </script>";
        }

        $sql = "UPDATE cliente set nome = :nome, telefone = :telefone, cep = :cep, 
        numerocasa = :numerocasa, complemento = :complemento, email = :email
        WHERE cpf = :cpf";
         
        $salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
            $salvar->bindParam(':cep', $dadoscad['cep'], PDO::PARAM_STR);
            $salvar->bindParam(':numerocasa', $dadoscad['numero'], PDO::PARAM_INT);
            $salvar->bindParam(':complemento', $dadoscad['complemento'], PDO::PARAM_STR);
            $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
            $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
            $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Dados Atualizados!');
                parent.location = 'relcliente.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Cliente não encontrado!');
                parent.location = 'relcliente.php';
                </script>";
            }


        }
*/
?>