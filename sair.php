<?php
    session_start();
    ob_start();

    unset ($_SESSION['nomeadm']);

    $_SESSION['msg'] = "Sessão Finalizada!";


    
    header("Location: admlogin.php");

?>