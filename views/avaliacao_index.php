<html>

<head>
    <title> Lista de Avaliações </title>
    <script src="https://kit.fontawesome.com/d1f76562fd.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'header.php' ?>

    <?php include 'import_js.php' ?>
    <div class="container col-md-8 col-12 mt-2">
        <div class="py-2"> <a class="btn btn-success" href="avaliacao.php?action=create"><i class="fa-solid fa-plus"> </i>fazer nova avaliação</a>

        </div>

        <h2>Lista de Avaliações</h2>

        <?php if (isset($avaliacoes) && $avaliacoes) { ?>

            <table class="table" id="TabelaAvaliacoes">
                <thead>
                    <tr>
                        <th> Id</th>
                        <th width="50%"> Nome</th>
                        <th>Stars</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($avaliacoes as $avaliacao) { ?>
                        <tr>
                            <td><?= $avaliacao['id'] ?></td>
                            <td><?= $avaliacao['nome'] ?></td>
                            <td><?= $avaliacao['stars'] ?></td> 
                            <td> <a style="width: 90px" href="avaliacao.php?action=show&id=<?= $avaliacao['id'] ?>"><i class="fa-solid fa-eye"></i></a> </td>
                            <td> <a style="width: 80px" href="avaliacao.php?action=edit&id=<?= $avaliacao['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i></a> </td>
                            <td> <a style="width: 90px" onclick="onDelete(<?= $avaliacao['id'] ?>)"><i class="fa-solid fa-trash"></i></a> </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <div class="alert alert-info" role="alert">
                Nenhuma avaliação cadastrada.
            </div>

        <?php } ?>

    </div>

    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            $('#btnDelete').attr('href', `avaliacao.php?action=destroy&id=${id}`);
            $('#deleteModal').modal('show');

        }
    </script>

</body>

</html>