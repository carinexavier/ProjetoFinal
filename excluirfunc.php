<?php

    require_once 'conexao.php';
    require_once 'head.php';

    $id = filter_input(INPUT_GET, "matricula", FILTER_SANITIZE_NUMBER_INT);

   $sql = "UPDATE funcionario set status = 'I' where matriculafunc = $id LIMIT 1";

    $resultado= $conn->prepare($sql);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
        echo "<script>
        alert('Funcionário excluído com sucesso!');
        parent.location = 'relfuncionario.php';
        </script>";

    }else{
        echo "<script>
        alert('Não foi possível excluir!');
        parent.location = 'relfuncionario.php';
        </script>";
    }

?>