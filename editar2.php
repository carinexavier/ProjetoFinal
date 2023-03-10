<?php

    include_once 'conexao.php';

    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dadoscad);

    

        if(isset($_FILES['foto'])){
            $arquivo = ($_FILES['foto']);

            if($arquivo['error']){
                echo 'Erro ao carregar arquivo';
                header ("Location: relfuncionario.php");
            }

            $pasta = "fotos/";
            $nomearquivo = $arquivo['name'];
            $novonome = uniqid();
            $extensao = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));

            if($extensao!="jpg" && $extensao!="png" && $extensao!="webp"){
                die("tipo não aceito");
            }
            else{
                $salvaimg = move_uploaded_file ($arquivo['tmp_name'], $pasta.$novonome. ".". $extensao);
            
                if($salvaimg){
                    $path = $pasta . $novonome . "." .$extensao;

                }
            }
        
        }



if(!empty($dadoscad["editarfunc"])){
           
           // var_dump($dadoscad);
   
           $dadoscad = array_map('trim', $dadoscad);
   
           if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
                $vazio = true;
                echo "<script>
                alert('Informe um email válido!');
                parent.location = 'relfuncionario.php';
                </script>";
           }
   
           $sql = "UPDATE funcionario set nome = :nome, telefone = :telefone, cpf= :cpf, cep = :cep, 
           numerocasa = :numerocasa, complemento = :complemento, email = :email, foto = :foto
           WHERE matricula = :matricula";
            
           $salvar= $conn->prepare($sql);
               $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
               $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
               $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
               $salvar->bindParam(':cep', $dadoscad['cep'], PDO::PARAM_STR);
               $salvar->bindParam(':numerocasa', $dadoscad['numero'], PDO::PARAM_INT);
               $salvar->bindParam(':complemento', $dadoscad['complemento'], PDO::PARAM_STR);
               $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
               $salvar->bindParam(':foto',$path,PDO::PARAM_STR);
              $salvar->bindParam(':matricula', $dadoscad['matricula'], PDO::PARAM_INT);
               $salvar->execute();
   
               if ($salvar->rowCount()) {
                   echo "<script>
                   alert('Dados Atualizados!');
                   parent.location = 'relfuncionario.php';
                   </script>";
                   unset($dadoscad); 
               } else {
                   echo "<script>
                   alert('Erro : Funcionário não encontrado!');
                   parent.location = 'relfuncionario.php';
                   </script>";
               }
   
   
           }

           ?>