<?php
    require_once 'head.php';
    session_start();
	ob_start();

    require_once 'conexao.php';
    
?>

<form method="POST" action="controleservico.php" enctype="multipart/form-data">
    <div class="container formbt">
        <div class="row">
            <div class="col-md-12">
                <h3>Faça seu agendamento!</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome">Nome do Dono(a)</label>
                    <input type="text" class="form-control" name="nome" 
                    value="<?php echo $_SESSION['nome']; ?>"   
                    >    
                </div>
            </div>   

            <div class="col-md-4">
                <div class="form-group">
                    <label for="nomepet">Pet</label>
                        <select id="nomepet" class="form-control">
                        <?php 
                        
                        $cpf = $_SESSION['cpf'];
                        $sql = "SELECT * from pet where cpf = '$cpf'";
                        $resultado=$conn->prepare($sql);
                        $resultado->execute();

                   
                        
                        if(($resultado) && ($resultado->rowCount()!=0)){
                            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
                                extract($linha);
                              
                        ?>

                    <option value="<?php echo $matriculapet; ?>"><?php echo $nomepet; ?></option>
                    <?php
                            }
                        }
                    ?>    
                        </select>
                </div>
            </div>
  
            <div class="col-md-4">
                <div class="form-group">
                <label for="servico">Serviço</label>
                    <select name="servico" class="form-control">
                        <?php
                            $sql2= "SELECT * from servico";
                            $resultado2=$conn->prepare($sql2);
                            $resultado2->execute();

                            if(($resultado2) && ($resultado2->rowCount()!=0)){
                                while ($linha2 = $resultado2->fetch(PDO::FETCH_ASSOC)){
                                    extract($linha2);
                        ?>                    
                    
                        <option value="<?php echo $idservico;?>"><?php echo $descricao;  ?></option>
                        
                        <?php
                                }
                            }
                        ?>
                    </select>  
                </div>     
            </div>
        </div>

        <div class="row">   
            <div class="col-md-5">
                <label>Escolha uma data para o procedimento</label>
                <input type="date" name="data">    
            </div>
            
            <div class="col-md-5">
                <label>Escolha um horário para o procedimento</label>
                <input type="time" name="hora">    
            </div>
        
            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="btnserv" value="Enviar">
                </div>  
            </div>
        </div>
    </div>
</form>

<?php
    require_once 'footeradm.php';
?>