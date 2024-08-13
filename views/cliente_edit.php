<html>

<head>
    <title>Editar dados</title>
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

.imagem-produto-grande{

    max-width: 100%;
    max-height: 100%;
}
</style>

<body>

    <?php include 'header.php' ?>

    <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-2">

        <h2>Editar cliente</h2>

        <?php if (isset($cliente) && $cliente) { ?>

            <form id="form-edit" method="POST" action="cliente.php?action=update" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                <div class="form-group">
                    <label for="titulo">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva seu nome completo" value="<?= $cliente['nome'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="<?= $cliente['cpf'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite um CEP" value="<?= $cliente['cep'] ?>">
                </div>

                <div class="form-group">
                    <label for="descricao">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Escreva seu email" value="<?= $cliente['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="url_website"> Link </label>
                    <input type="url" name="url_website" id="url_website" class="form-control">
                </div>

                <div class="form-group">
                        <label for="imagem"> Substituir Imagem </label>
                        <input type="file" name="url_imagem" id="url_imagem" class="form-control">
                </div>

                <?php if (isset($cliente['url_imagem'])){ ?>
                <div class="row my-3">
                    <div class="col-8">
                        <img class="imagem-produto imagem-borda" src="<?= $cliente['url_imagem'] ?>" >
                    </div>
                </div>
                <?php } ?>

            <button type="button" onclick="onEdit()" class="btn btn-primary">Confirmar</button>

            <div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Salvar alterações?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" onclick="onEditConfirm()">Confirmar</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        <?php } ?>
        
    </div>

</body>

<?php include 'import_js.php' ?>

<script>
    function onEdit(){
        $('#modal-confirm').modal('show');
    }
    function onEditConfirm(){
        $('#form-edit').submit();
    }
</script>

</html>