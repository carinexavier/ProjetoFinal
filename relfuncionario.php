<?php
    require_once 'conexao.php';
    require_once 'head.php';

    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 2;

    $inicio = ($limitereg * $pag) - $limitereg;

    $busca = "SELECT matricula,nome,telefone,cpf,email,foto from
    funcionario WHERE status = 'A' LIMIT $inicio , $limitereg";         

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>
  
<body style="background-color: #e3f2fd;">  

<table class="table table-bordered">
    <thead>
        <th>Foto</th>
        <th>Matrícula</th>
        <th>Cpf</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Função</th>
    </thead>
<tbody>

<?php
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
    // var_dump($linha);
    extract($linha);
?>
                    
<tr>
    <td><img src="<?php echo $foto; ?>" style=width:150px;height:150px;></td>
    <td><?php echo $matricula; ?></td>
    <td><?php echo $cpf; ?></td>
    <td><?php echo $nome; ?></td>
    <td><?php echo $telefone; ?></td>
    <td><?php echo $email; ?></td>
    <td> 
        <?php echo "<a href='editarfunc.php?matricula=$matricula'>" ; ?>                    
        <input type="submit" class="btn btn-primary" name="editarfunc" value="Editar">
    </td>

    <td>  
        <?php echo "<a href='excluirfunc.php?matricula=$matricula'>" ; ?>               
        <input type="submit" class="btn btn-danger" name="excluir" value="Excluir">
    </td>
</tr>
                                       
<?php
    } 
?>

</tbody>
</table>

<?php

    }

    $qtregistro = "SELECT COUNT(matricula) AS registros FROM funcionario WHERE status='A'";
    $resultado = $conn->prepare($qtregistro);
    $resultado->execute();
    $resposta = $resultado->fetch(PDO::FETCH_ASSOC);

    $qnt_pagina = ceil($resposta['registros'] / $limitereg);
 
     $maximo = 2;

     echo "<a href='relfuncionario.php?page=1'>Primeira</a> ";

     for ($anterior = $pag - $maximo; $anterior <= $pag - 1; $anterior++) {
       if ($anterior >= 1) {
           echo "  <a href='relfuncionario.php?page=$anterior'>$anterior</a> ";
       }
   }

   echo "$pag";

   for ($proxima = $pag + 1; $proxima <= $pag + $maximo; $proxima++) {
       if ($proxima <= $qnt_pagina) {
           echo "<a href='relfuncionario.php?page=$proxima'>$proxima</a> ";
       }
   }

   echo "<a href='relfuncionario.php?page=$qnt_pagina'>Última</a> ";

?>

</body>