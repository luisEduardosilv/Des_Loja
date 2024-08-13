<html>

<head>
    <title> Lista de Clientes </title>
    <script src="https://kit.fontawesome.com/d1f76562fd.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'header.php' ?>

    <?php include 'import_js.php' ?>
    <div class="container col-md-8 col-12 mt-2">
        <div class="py-2"> <a class="btn btn-success" href="cliente.php?action=create"><i class="fa-solid fa-plus"> </i>Cadastro</a>

        </div>

        <h2>Lista de Clientes</h2>

        <?php if (isset($clientes) && $clientes) { ?>

            <table class="table" id="TabelaProdutos">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th width="50%"> Nome </th>
                        <th> Email </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($clientes as $cliente) { ?>
                        <tr>
                            <td><?= $cliente['id'] ?></td>
                            <td><?= $cliente['nome'] ?></td>
                            <td><?= $cliente['email'] ?></td>

                            <td> <a style="width: 90px" class="btn btn-primary" href="cliente.php?action=show&id=<?= $cliente['id'] ?>"><i class="fa-solid fa-eye"></i> Show </a> </td>
                            <td> <a style="width: 80px" class="btn btn-info" href="cliente.php?action=edit&id=<?= $cliente['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i> Edit </a> </td>
                            <td> <button style="width: 90px" class="btn btn-danger" onclick="onDelete(<?= $cliente['id'] ?>)"><i class="fa-solid fa-trash"></i> Delete </button> </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <div class="alert alert-info" role="alert">
                Nenhum produto cadastrado.
            </div>

        <?php } ?>

    </div>

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
                    <a id="btnDelete" class="btn btn-primary">Confirmar</a>
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
    </script>


</body>

</html>