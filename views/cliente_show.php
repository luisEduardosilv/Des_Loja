<html>

<head>
    <title>Mostrar dados do cliente</title>
</head>

<?php include 'import_css.php' ?>

<style>
.imagem-produto{
    max-width: 300px;
    max-height: 300px;
}

.imagem-borda{
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px
}

.imagem-produto:hover{
    cursor: zoom-in;
}

.imagem-produto-grande{

    max-width: 100%;
    max-height: 100%;
}
</style>


<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2">

        <?php if (isset($cliente) && $cliente) { ?>

            <h2>Dados do cliente</h2>

            <div class="row my-2">
                <div class="col-4 font-weight-bold"> Nome </div>
                <div class="col-8"><?= $cliente['nome'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold"> CPF </div>
                <div class="col-8"><?= $cliente['cpf'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold"> CEP </div>
                <div class="col-8"><?= $cliente['cep'] ?></div>
            </div>

            <div class="row my-2">
                <div class="col-4 font-weight-bold"> Email </div>
                <div class="col-8"><?= $cliente['email'] ?></div>
            </div>

            <?php if (isset($cliente['url_imagem'])){ ?>
                <div class="row my-3">
                    <div class="col-4 fw-bold"> Imagem </div>
                    <div class="col-8">
                        <img class="imagem-produto imagem-borda" onclick="onZoomIn()" src="<?= $cliente['url_imagem'] ?>" >
                    </div>
                </div>
            <?php } ?>

            <div class="row my-2">
                <div class="col-4 font-weight-bold"> Link </div>
                <div class="col-8"><a href="<?= $cliente['url_website'] ?>"><?= $cliente['url_website'] ?></a></div>
            </div>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="cliente.php?action=edit&id=<?= $cliente['id'] ?>">Editar </a>
                <button class="btn btn-danger" onclick="onDelete(<?= $cliente['id'] ?>)">Apagar </button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja deletar este cliente?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" id="btnDelete">Confirmar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="zoomInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img class="imagem-produto-grande" src="<?= $cliente['url_imagem'] ?>">
                            </div>
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
                    
                    $('#btnDelete').attr('href', `cliente.php?action=destroy&id=${id}`);
                    $('#deleteModal').modal('show');

                }

                function onZoomIn(){
                    $("#zoomInModal").modal('show');
                }
            </script>

        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhuma informação para mostrar.
            </div>

        <?php } ?>

    </div>

</body>

<?php include 'import_js.php' ?>

</html>