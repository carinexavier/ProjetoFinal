<?php
    require_once 'conexao.php';
    require_once 'head.php';

    $pagatual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
	$pag = (!empty($pagatual)) ? $pagatual : 1;

    $limitereg = 2;

    $inicio = ($limitereg * $pag) - $limitereg;

    $busca = "SELECT a.idagendamento,p.nomepet,a.nome,s.descricao,a.hora,a.data from
    agendamento a,pet p,servico s WHERE p.matriculapet = a.matriculapet and s.idservico = a.idservico 
    LIMIT $inicio , $limitereg";         

    $resultado= $conn->prepare($busca);
    $resultado->execute();

    if (($resultado) AND ($resultado->rowCount() != 0)) {
?>
  
<body style="background-color: #e3f2fd;">  

<table class="table table-bordered">
    <thead>
        <th>Nome do Pet</th>
        <th>Nome Dono</th>
        <th>Serviço</th>
        <th>Hora</th>
        <th>Data</th>
    </thead>
<tbody>

<?php
    while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
    // var_dump($linha);
    extract($linha);
?>
                    
<tr>
    <td><?php echo $nomepet; ?></td>
    <td><?php echo $nome; ?></td>
    <td><?php echo $descricao; ?></td>
    <td><?php echo $hora; ?></td>
    <td><?php echo $data; ?></td>
</tr>
                                       
<?php
    } 
?>

</tbody>
</table>

<?php

    }

    $qtregistro = "SELECT COUNT(idagendamento) AS registros FROM agendamento WHERE idagendamento > 0";
    $resultado = $conn->prepare($qtregistro);
    $resultado->execute();
    $resposta = $resultado->fetch(PDO::FETCH_ASSOC);

    $qnt_pagina = ceil($resposta['registros'] / $limitereg);
 
     $maximo = 2;

     echo "<a href='relservico.php?page=1'>Primeira</a> ";

     for ($anterior = $pag - $maximo; $anterior <= $pag - 1; $anterior++) {
       if ($anterior >= 1) {
           echo "  <a href='relservico.php?page=$anterior'>$anterior</a> ";
       }
   }

   echo "$pag";

   for ($proxima = $pag + 1; $proxima <= $pag + $maximo; $proxima++) {
       if ($proxima <= $qnt_pagina) {
           echo "<a href='relservico.php?page=$proxima'>$proxima</a> ";
       }
   }

   echo "<a href='relservico.php?page=$qnt_pagina'>Última</a> ";

?>

</body>