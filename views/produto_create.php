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
<?php include 'header.php' ?>

<div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Cadastrar Produto</h2>       
        <form action="produto.php?action=store" method="post" class="row p-2 g-2" enctype="multipart/form-data">
            
            <div>
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escreva um título">
            </div>

            <div>
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows=5></textarea>
            </div>

            <div class="col-6">
                <label for="preco">Preço</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend input-group-text">R$</div>
                    <input type="number" class="form-control col-3" name="preco" id="preco" min="0" step="0.05">
                </div>
            </div>
            <div>
            <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem" class="form-control"></div>
            <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
        </form>
    </div> 

   <?php include 'import_js.php'?>
</body>
</html>