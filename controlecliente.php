<?php
include_once 'conexao.php';

$dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dadoscad["btncad"])){
           
    // var_dump($dadoscad);

    $vazio = false;
    $dadoscad = array_map('trim', $dadoscad);
        if (in_array("", $dadoscad)) {
        $vazio = true;
               
        echo "<script>
        alert('Preencher todos os campos!');
        parent.location = 'frmcliente.php';
        </script>";

        } else if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
        $vazio = true;
        echo "<script>
        alert('Informe um email válido!');
        parent.location = 'frmcliente.php';
        </script>";
        }
            
        if(!$vazio){          
        $senha = password_hash($dadoscad['senha'], PASSWORD_DEFAULT);

        $sql = "insert into cliente(nome,telefone,cpf,cep,numerocasa,
        complemento,email,senha)values
        (:nome,:telefone,:cpf,:cep,:numerocasa,:complemento,:email,:senha)";

      	$salvar= $conn->prepare($sql);
        $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
        $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
        $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
        $salvar->bindParam(':cep', $dadoscad['cep'], PDO::PARAM_STR);
        $salvar->bindParam(':numerocasa', $dadoscad['numerocasa'], PDO::PARAM_INT);
        $salvar->bindParam(':complemento', $dadoscad['complemento'], PDO::PARAM_STR);
        $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
        $salvar->bindParam(':senha', $senha, PDO::PARAM_STR);
        $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Cliente cadastrado com Sucesso!');
                parent.location = 'frmcliente.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Cliente não cadastrado!');
                parent.location = 'frmcliente.php';
                </script>";
            }
        }
     
    }

    if(!empty($dadoscad["editarcli"])){
           
        // var_dump($dadoscad);

        $dadoscad = array_map('trim', $dadoscad);

        if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
             $vazio = true;
             echo "<script>
             alert('Informe um email válido!');
             parent.location = 'editarcli.php';
             </script>";
        }

        $sql = "UPDATE cliente set cpf = :cpf, nome = :nome, telefone = :telefone, cep = :cep, 
        numerocasa = :numerocasa, complemento = :complemento, email = :email
        WHERE cpf = :cpf";
         
        $salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
            $salvar->bindParam(':cep', $dadoscad['cep'], PDO::PARAM_STR);
            $salvar->bindParam(':numerocasa', $dadoscad['numero'], PDO::PARAM_INT);
            $salvar->bindParam(':complemento', $dadoscad['complemento'], PDO::PARAM_STR);
            $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
            $salvar->bindParam(':cpf', $cpf, PDO::PARAM_STR);
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

?>