<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cadastrar avaliação </title>
    <?php include 'import_css.php' ?>
</head>

<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
        <h2 class="text-center">Cadastrar avaliação</h2>
        <form action="avaliacao.php?action=store" method="post" class="row p-2 g-2" enctype="multipart/form-data">

            <div>
                <label for="titulo">ID do produto</label>
                <input type="text" class="form-control" name="id_produto" id="id_produto" placeholder="Insira o id do produto">
            </div>
            <div>
                <label for="titulo">Nome completo</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o seu nome">
            </div>

            <div>
                <label for="titulo">descrição</label>
                <input type="text" class="form-control" name="texto" id="texto" placeholder="escreva sua avaliação">
            </div>

            <div>
                <label for="titulo">stars</label>
                <input type="number" max="5" class="form-control" name="stars" id="stars">
            </div>
<div>
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
    </div>

    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
</div>
    </form>
    </div>

    <?php include 'import_js.php' ?>
</body>

</html>