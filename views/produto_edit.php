<html>

<head>
    <title>Editar Produto</title>
</head>

<?php include 'import_css.php' ?>

<style>
.imagem_produto{
    max-width: 300px;
    max-height: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}

</style>

<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2">

        <h2>Editar Produto</h2>

        <?php if (isset($produto) && $produto) { ?>

            <form id="form-edit" method="POST" action="produto.php?action=update" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escreva o título ou nome do produto" value="<?= $produto['titulo'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4"><?= $produto['descricao'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend input-group-text">R$</div>
                        <input type="number" class="form-control col-3" id="preco" name="preco" min="0" step="0.01" placeholder="0,00" value="<?= $produto['preco'] ?>">
                    </div>
                </div>

                <?php if (isset($produto['imagem'])){ ?>
                <div class="row my-3">
                <div class="col-4 fw-bold">Imagem</div>
                <div class="col-8">
                    <img class="imagem_produto" onclick="onZoomIn()" src="<?=$produto['imagem']?>" alt="">
            </div>
                </div>
           <?php } ?>
                
                <div class="form-group">
                <label for="imagem">Imagem</label>
    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>

                
                <button type="submit" id="onEdit" class="btn btn-primary">Confirmar</button>
                

            </form>

        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhum produto para mostrar.
            </div>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="produto.php?action=edit&id=<?= $produto['id'] ?>"> Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $produto['id'] ?>)">Apagar Produto</button>

                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja deletar o produto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="btnDelete">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

</body>

<?php include 'import_js.php' ?>

<script>
    function onEdit(id){
        $('#modal-confirm').modal('show');
    }
    function onEditConfirm(){

    }
</script>

</html>