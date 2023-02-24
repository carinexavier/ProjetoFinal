<?php
    require_once 'head.php';
    session_start();
	ob_start();
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
                <?php echo "Cliente " . $_SESSION['nome']; ?>
                </div>
            </div>           

            <div class="col-md-4">
                <label for="nomepet">Pet</label>
                    <select name="nomepet" class="form-control">
                        <?php
                            $sql = "SELECT * from `pet`";
                            $resultado=$conn->prepare($sql);
                            $resultado->execute();

                            if(($resultado) && ($resultado->rowCount()!=0)){
                                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
                                    extract($linha);
                        ?>                    
                    
                        <option value="<?php echo $matriculapet;?>"><?php echo $nomepet;?></option>
                        
                        <?php
                                }
                            }
                        ?>
                    </select>       
            </div>
  
            <div class="col-md-4">
                <div class="form-group">
                <label for="servico">Serviço</label>
                    <select name="servico" class="form-control">
                        <?php
                            $sql = "SELECT * from `servico`";
                            $resultado=$conn->prepare($sql);
                            $resultado->execute();

                            if(($resultado) && ($resultado->rowCount()!=0)){
                                while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
                                    extract($linha);
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