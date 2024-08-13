<html>

<head>
    <title>Mostrar Avaliação</title>
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

.imagem_produto:hover{
    cursor: zoom-in;
}

.imagem_produto_grande{
    max-width: 100%;
    max-height: 100%;
}

</style>

<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2">

        <?php if (isset($avaliacao) && $avaliacao) { ?>

            <h2>Mostrar dados da avaliação</h2>

            <div class="row my-2">
                <div class="col-4 fw-bold">Nome</div>
                <div class="col-8"><?= $avaliacao['nome'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 fw-bold">Descricão</div>
                <div class="col-8"><?= $avaliacao['texto'] ?></div>
            </div>

            <?php if (isset($avaliacao['url_imagem'])){ ?>
                <div class="row my-3">
                <div class="col-4 fw-bold">Imagem</div>
                <div class="col-8">
                    <img class="imagem_produto" onclick="onZoomIn()" src="<?=$avaliacao['url_imagem']?>" alt="">
            </div>
                </div>
           <?php } ?>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="avaliacao.php?action=edit&id=<?= $avaliacao['id'] ?>">Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $avaliacao['id'] ?>)">Apagar avaliação</button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deletar?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja apagar a avaliação?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" id="btnDelete">Confirmar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="zoomInModal" tabindex="-1" aria-labelledby="zoomInModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
      <img class="imagem_produto_grande" src="<?=$avaliacao['url_imagem']?>" alt="">
      </div>
    </div>
  </div>
</div>
            <?php include 'import_css.php' ?>
            <script>
                $(document).ready(function() {
                    $('#TabelaProdutos').DataTable();
                });

                function onDelete(id) {
                    
                    $('#btnDelete').attr('href', `avaliacao.php?action=destroy&id=${id}`);
                    $('#deleteModal').modal('show');

                }
                function onZoomIn(){
                    $("#zoomInModal").modal('show');
                }
            </script>

        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhum produto para mostrar.
            </div>

        <?php } ?>

    </div>

</body>

<?php include 'import_js.php' ?>

</html>