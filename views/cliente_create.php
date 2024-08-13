<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <?php include 'import_css.php' ?>
    </head>

    <?php include 'header.php' ?>
</body>
    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Cadastro de cliente</h2>       
        <form action="cliente.php?action=store" method="post" class="row p-2 g-2" enctype="multipart/form-data">
            
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
                <label for="titulo">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira um cpf">
            </div>

            <div>
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" placeholder="Insira seu cep">
            </div>

            <div class="form-group">
                    <label for="url_website"> Link </label>
                    <input type="url" name="url_website" id="url_website" class="form-control">
            </div>

            <div class="form-group">
                    <label for="imagem"> Colocar Imagem </label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
        </form>
    </div> 
    </body>
    
    <?php include 'import_js.php'?>
    </html>
