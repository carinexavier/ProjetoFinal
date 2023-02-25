<?php

    require_once 'conexao.php';
    require_once 'head.php';

    $id = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);

   $sql = "UPDATE cliente set status = 'I' where cpf = $id LIMIT 1";

    $resultado= $conn->prepare($sql);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
        echo "<script>
        alert('Cliente excluído com sucesso!');
        parent.location = 'relcliente.php';
        </script>";

    }else{
        echo "<script>
        alert('Não foi possível excluir!');
        parent.location = 'relcliente.php';
        </script>";
    }

?>