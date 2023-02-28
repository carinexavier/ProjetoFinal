<?php
require_once 'conexao.php';

session_start();
ob_start();
?>

<?php
$dadoscad = filter_input_array(INPUT_POST,FILTER_DEFAULT);
  
if(!empty($dadoscad["btnserv"])){

  $vazio = false;

  $dadoscad = array_map('trim', $dadoscad);
  if (in_array("", $dadoscad)) {
    $vazio = true;
      echo "<script> alert('Por favor, preencher todos os campos!');
      parent.location = 'frmservico.php'; </script>";
  }

  if(!$vazio){

  $sql = "insert into agendamento(cpf,nome,matriculapet,idservico,data,hora) 
  values(:cpf,:nome,:matriculapet,:idservico,:data,:hora)";
  $salvar = $conn -> prepare($sql);
  $salvar -> bindParam(':cpf',$dadoscad['cpf'],PDO::PARAM_STR);
  $salvar -> bindParam(':nome',$dadoscad['nome'],PDO::PARAM_STR);
  $salvar -> bindParam(':matriculapet',$dadoscad['matriculapet'],PDO::PARAM_INT);
  $salvar -> bindParam(':idservico',$dadoscad['idservico'],PDO::PARAM_STR);
  $salvar -> bindParam(':data',$dadoscad['data'],PDO::PARAM_STR);
  $salvar -> bindParam(':hora',$dadoscad['hora'],PDO::PARAM_STR);
  $salvar -> execute();

    if($salvar->rowCount()){
      echo "<script> alert('Agendamento feito com sucesso!');
      parent.location = 'frmservico.php'; </script>";
      unset($dadoscad);
    } else{
      echo "<script> alert('Erro: Agendamento não realizado!');
      parent.location = 'frmservico.php'; </script>";
    }
  }
}
?>