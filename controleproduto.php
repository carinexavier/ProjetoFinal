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

        $pasta = "produtos/";
        $nomearquivo = $arquivo['name'];
        $novonome = uniqid();
        $extensao = strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));

        if($extensao!="jpg" && $extensao!="png" && $extensao!="webp"){
            die("Tipo não aceito");
        }
        else{
            $salvaimg = move_uploaded_file($arquivo['tmp_name'], $pasta . $novonome . "." . $extensao);

            if($salvaimg){
                $path = $pasta . $novonome . "." . $extensao;
               
            }

        }

    }

		if(!empty($dadoscad["btncad"])){
           
           // var_dump($dadoscad);

            $vazio = false;

            $dadoscad = array_map('trim', $dadoscad);
            if (in_array("", $dadoscad)) {
                $vazio = true;
               
                echo "<script>
                alert('Preencher todos os campos!');
                parent.location = 'frmproduto.php';
                </script>";

            } 
            
            if(!$vazio){           
           

            $sql = "insert into produto(nome,marca,quantidade,preco,foto,idcategoria)
            values(:nome,:marca,:quantidade,:preco,:foto,:idcategoria)";

        	$salvar= $conn->prepare($sql);
            $salvar->bindParam(':nome', $dadoscad['nome'], PDO::PARAM_STR);
            $salvar->bindParam(':marca', $dadoscad['marca'], PDO::PARAM_STR);
            $salvar->bindParam(':quantidade', $dadoscad['quantidade'], PDO::PARAM_INT);
            $salvar->bindParam(':preco', $dadoscad['preco'], PDO::PARAM_STR);
            $salvar->bindParam(':foto',$path,PDO::PARAM_STR);
            $salvar->bindParam(':idcategoria', $dadoscad['categoria'], PDO::PARAM_INT);
            $salvar->execute();

            if ($salvar->rowCount()) {
                echo "<script>
                alert('Produto cadastrado com Sucesso!');
                parent.location = 'frmproduto.php';
                </script>";
                unset($dadoscad); 
            } else {
                echo "<script>
                alert('Erro : Produto não cadastrado!');
                parent.location = 'frmproduto.php';
                </script>";
            }
       		
     }
     
    }

?>