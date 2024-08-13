<html>

<head>
    <title>Editar avaliação</title>
</head>

<?php include 'import_css.php' ?>

<style>
    .imagem_produto {
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

        <?php if (isset($avaliacao) && $avaliacao) { ?>

            <form id="form-edit" method="POST" action="avaliacao.php?action=update" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $avaliacao['id'] ?>">

                <div class="form-group">
                    <label for="nome">Nome do cliente</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o seu nome" value="<?= $avaliacao['nome'] ?>">
                </div>

                <div class="form-group">
                    <label for="texto">Descrição</label>
                    <textarea class="form-control" id="texto" name="texto" rows="4"><?= $avaliacao['texto'] ?></textarea>
                </div>

                <div>
                    <label for="titulo">stars</label>
                    <input type="number" max="5" class="form-control" name="stars" id="stars" value="<?= $avaliacao['stars'] ?>">
                </div>

                <?php if (isset($avaliacao['url_imagem'])) { ?>
                    <div class="row my-3">
                        <div class="col-4 fw-bold">Imagem</div>
                        <div class="col-8">
                            <img class="imagem_produto" onclick="onZoomIn()" src="<?= $avaliacao['url_imagem'] ?>" alt="">
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" name="imagem" id="imagem" class="form-control">
                </div>


                <button type="button" onclick="onEdit()" class="btn btn-primary">Confirmar</button>


            </form>

            <div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">editar?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Você tem certeza que deseja editar a avaliação?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" onclick="onEditConfirm()">Confirmar</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<?php } else { ?>

    <div class="alert alert-info" role="alert">
        Nenhum produto para mostrar.
    </div>

<?php } ?>
</div>

</body>

<?php include 'import_js.php' ?>

<script>
    function onEdit() {
        $('#modal-confirm').modal('show');
    }

    function onEditConfirm() {
        $('#form-edit').submit();
    }
</script>

</html>