<?php
    require_once 'head.php';
    require_once 'menu.php';
?>

<div class="container-fluid titulobt">
    <div class="row">
        <div class="col-md-12">
            <h1>Procedimentos oferecidos:</h1>
        </div>
    </div>
</div>
    

<div class="container bt">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="imagens/banho.webp" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Banho</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="imagens/tosa.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Tosa</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="imagens/estetica.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                <p class="card-text"><b>Estética</b></p>
                </div>
            </div>
        </div>
    </div>
</div>

<form>
<div class="container-fluid formbt">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Faça seu agendamento!</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="matricula">Nome do pet</label>
                <input type="text" class="form-control" name="nomepet" placeholder="Nome do seu Pet">    
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
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">                   
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
        <div class="col-md-5">
            <form>
                <label>Escolha o procedimento para o seu pet</label>
                <select name="procedimento">
                    <option value="banho">Banho</option>
                    <option value="tosa">Tosa</option>
                    <option value="estetica">Estética</option>
                    <option value="pacote">Pacote completo</option>        
                </select>
            </form>      
        </div>

        <div class="col-md-5">
           <label>Escolha uma data para o procedimento</label>
           <input type="date" name="data">    
        </div>
        
        <div class="col-md-2 text-right">
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