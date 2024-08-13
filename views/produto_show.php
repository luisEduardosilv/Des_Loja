<html>

<head>
    <title>Mostrar Produto</title>
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

        <?php if (isset($produto) && $produto) { ?>

            <h2>Mostrar dados do Produto</h2>

            <div class="row my-2">
                <div class="col-4 fw-bold">Título</div>
                <div class="col-8"><?= $produto['titulo'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 fw-bold">Descricão</div>
                <div class="col-8"><?= $produto['descricao'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 fw-bold">Preco</div>
                <div class="col-8">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></div>
            </div>

            <?php if (isset($produto['imagem'])){ ?>
                <div class="row my-3">
                <div class="col-4 fw-bold">Imagem</div>
                <div class="col-8">
                    <img class="imagem_produto" onclick="onZoomIn()" src="<?=$produto['imagem']?>" alt="">
            </div>
                </div>
           <?php } ?>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="produto.php?action=edit&id=<?= $produto['id'] ?>">Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $produto['id'] ?>)">Apagar Produto</button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <img class="imagem_produto_grande" src="<?=$produto['imagem']?>" alt="">
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
                    
                    $('#btnDelete').attr('href', `produto.php?action=destroy&id=${id}`);
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