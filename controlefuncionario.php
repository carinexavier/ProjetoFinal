<?php

    include_once 'conexao.php';

    $dadoscad = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dadoscad);

    

        if(isset($_FILES['foto'])){
            $arquivo = ($_FILES['foto']);

            if($arquivo['error']){
                echo 'Erro ao carregar arquivo';
                header ("Location: frmfuncionario.php");
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




		if(!empty($dadoscad["btncad"])){
           
       

            $vazio = false;

            $dadoscad = array_map('trim', $dadoscad);
            if (in_array("", $dadoscad)) {
                $vazio = true;
               
                echo "<script>
                alert('Preencher todos os campos!');
                parent.location = 'frmfuncionario.php';
                </script>";

            } else if(!filter_var($dadoscad['email'], FILTER_VALIDATE_EMAIL)) {
                $vazio = true;
                echo "<script>
                alert('Informe um email válido!');
                parent.location = 'frmfuncionario.php';
                </script>";
            }
            
            if(!$vazio){

            
            $senha = password_hash($dadoscad['senha'], PASSWORD_DEFAULT);
           
            $status = "A";

            $sql = "insert into funcionario(nome,telefone,cpf,cep,numerocasa,complemento,email,senha,status,foto)values
            (:nome,:telefone,:cpf,:cep,:numerocasa,:complemento,:email,:senha,:status,:foto)";

        	$salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':telefone', $dadoscad['telefone'], PDO::PARAM_STR);
            $salvar->bindParam(':cpf', $dadoscad['cpf'], PDO::PARAM_STR);
            $salvar->bindParam(':cep', $dadoscad['cep'], PDO::PARAM_STR);
            $salvar->bindParam(':numerocasa', $dadoscad['numero'], PDO::PARAM_INT);
            $salvar->bindParam(':complemento', $dadoscad['complemento'], PDO::PARAM_STR);
            $salvar->bindParam(':email', $dadoscad['email'], PDO::PARAM_STR);
            $salvar->bindParam(':senha', $senha, PDO::PARAM_STR);
            $salvar->bindParam(':status', $status, PDO::PARAM_STR);
            $salvar->bindParam(':foto',$path,PDO::PARAM_STR);         
            $salvar->execute();

         if ($salvar->rowCount()) {
                echo "<script>
                alert('Cadastrado com Sucesso!');
                parent.location = 'frmfuncionario.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Usuário não cadastrado!');
                parent.location = 'frmfuncionario.php';
                </script>";
            }
       		
     }
     
    }



    

?>