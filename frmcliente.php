<?php
    require_once 'head.php';
?>


<form method="POST" action="controlecliente.php" enctype="multipart/form-data">
<div class="container frmcliente">
    <div class="row">
        <div class="col-md-12 text-center">     
             <h3>Cadastro de Cliente</h3>
        </div>
    </div>

    <form>
        <div class="row">
            <div class="col-md-3"> 
                <div class="form-group">
                    <label for="cpf">Cpf</label>
                    <input type="text" class="form-control" name="cpf" onkeypress="$(this).mask('000.000.000-00');">   
                </div>
            </div>

            <div class="col-md-3"> 
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" onkeypress="$(this).mask('(00)00000-0000');">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"> 
                <div class="form-group">
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" class="form-control" id="cep" onblur="pesquisacep(this.value);"> 
                </div>
            </div>

            <div class="col-md-3"> 
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="rua" name="rua">
                </div>
            </div>

            <div class="col-md-3"> 
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf">
                </div>
            </div>

            <div class="col-md-3 ">
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