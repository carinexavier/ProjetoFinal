<?php
    require_once 'head.php';
?>


<form method="POST" action="controlepet.php" enctype="multipart/form-data">
<div class="container frmpet">
    <div class="row">
        <div class="col-md-12 text-center">     
             <h3>Cadastro de Pet</h3>
        </div>
    </div>

    <form>
        <div class="row">
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">   
                </div>
            </div>

            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" class="form-control" name="raca">
                </div>
            </div>
        </div>

        <div class="row">    
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" name="cor">
                </div>
            </div>
            
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="text" class="form-control" name="idade">
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btncad">Enviar</button>
                </div>
            </div>
        </div>
    </form>

</div>

<?php
    require_once 'footeradm.php';
?>