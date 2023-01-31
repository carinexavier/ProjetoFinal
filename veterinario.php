<?php
    require_once 'head.php';
    require_once 'menu.php';
?>

<div class="container-fluid vet">
    <div class="row" >
        <div class="col-md-12">
            <img src="imagens/_bannervet.png" class="img-fluid">
        </div>
    </div>
</div>


<form>
<div class="container-fluid formvet">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Faça seu agendamento!</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="matricula">Nome do pet</label>
                <input type="text" class="form-control" name="matricula" placeholder="Nome do seu Pet">    
            </div>
        </div>           

        <div class="col-md-4">
            <div class="form-group">
                <label for="nome">Nome do dono</label>
                <input type="text" class="form-control" name="nome" placeholder="Seu Nome">    
            </div>
        </div>           

        <div class="col-md-4">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control" onkeypress="$(this).mask('(00)00000-0000')" placeholder="Seu Telefone">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu Email">                   
            </div>
        </div>
        
        <div class="col-md-4">        
            <div class="form-group">            
                <label for="cpf">Cpf</label>
                <input type="text" name="cpf" class="form-control" onkeypress="$(this).mask('000.000.000-00');" placeholder="Seu CPF">
            </div>
        </div>

        <div class="col-md-4">            
            <div class="form-group">
                <label for="cep">Cep</label>
                <input type="text" name="cep" class="form-control" id="cep" onblur="pesquisacep(this.value)" placeholder="Seu CEP">                    
            </div>
        </div>
    </div>
    
    <div class="row">   
        <div class="col-md-9">
           <label>Escolha uma data para o procedimento</label>
           <input type="date" name="data">    
        </div>
        
        <div class="col-md-3 text-right">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar" name="btneditar">
            </div>  
        </div>
    </div>
       
</div>
</form>


<?php
    require_once 'footer.php';
?>