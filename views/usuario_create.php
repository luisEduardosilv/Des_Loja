<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cadastrar Produto </title>
    <?php include 'import_css.php'?>
</head>
<body>


<div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Cadastrar usuário</h2>       
        <form action="usuario.php?action=store" method="post" class="row p-2 g-2">
            
            <div>
                <label for="titulo">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Insira o email">
            </div>
            
            <div>
                <label for="titulo">Nome completo</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome">
            </div>

            <div>
                <label for="titulo">Data de nascimento</label>
                <input type="date"  class="form-control" name="data_nascimento" id="data_nascimento">
            </div>

            <div>
                <label for="titulo">Senha</label>
                <input type="password" class="form-control" name="senha" id="titulo" placeholder="Insira sua senha">
            </div>
            
            <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
        </form>
    </div> 

   <?php include 'import_js.php'?>
</body>
</html>