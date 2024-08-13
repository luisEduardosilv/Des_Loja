<html>

<head>
    <title>Editar Produto</title>
</head>

<?php include 'import_css.php' ?>

<body>

    <?php include 'header.php' ?>

        <?php if (isset($usuario) && $usuario) { ?>

            <div class="container col-lg-4 col-md-6 col-sm-8 col-10 mt-4 border p-2 g-2">
                <h2 class="text-center">Editar usuário</h2>
                <form action="usuario.php?action=update" method="post" class="row p-2 g-2" >


                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                
                <div class="form-group">
                    <label for="titulo">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Escreva o email do usuario" disabled value="<?= $usuario['email'] ?>">
                </div>

                    <div>
                        <label for="titulo">Nome completo</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" value="<?= $usuario['nome'] ?>">
                    </div>

                    <div>
                        <label for="titulo">Data de nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?= $usuario['data_nascimento'] ?>">
                    </div>

                    <div>
                        <label for="titulo">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua nova senha">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                </form>
            </div>


        <?php } else { ?>

            <div class="alert alert-info" role="alert">
                Nenhum usuario para mostrar.
            </div>

            <div class="btn-group col-12 mt-3">
                <a class="btn btn-success" href="usuario.php?action=edit&usuario=<?= $usuario['email'] ?>"> Editar Dados</a>
                <button class="btn btn-danger" onclick="onDelete(<?= $usuario['email'] ?>)">Apagar Produto</button>

                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja deletar o usuario?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" id="btnDelete">Confirmar</a>
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
    function onEdit($usuario) {
        $('#modal-confirm').modal('show');
    }

    function onEditConfirm() {

    }
</script>

</html>