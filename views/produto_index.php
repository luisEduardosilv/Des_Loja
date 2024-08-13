<html>

<head>
    <title> Lista de Produtos </title>
    <script src="https://kit.fontawesome.com/d1f76562fd.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include 'header.php' ?>

    <?php include 'import_js.php' ?>
    <div class="container col-md-8 col-12 mt-2">
        <div class="py-2"> <a class="btn btn-success" href="produto.php?action=create"><i class="fa-solid fa-plus"> </i>Criar Produto</a>

        </div>

        <h2>Lista de Produtos</h2>

        <?php if (isset($produtos) && $produtos) { ?>

            <table class="table" id="TabelaProdutos">
                <thead>
                    <tr>
                        <th> Id</th>
                        <th width="50%"> Título</th>
                        <th> Preço </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?= $produto['id'] ?></td>
                            <td><?= $produto['titulo'] ?></td>
                            <td> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>

                            <td> <a style="width: 90px" href="produto.php?action=show&id=<?= $produto['id'] ?>"><i class="fa-solid fa-eye"></i></a> </td>
                            <td> <a style="width: 80px" href="produto.php?action=edit&id=<?= $produto['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i></a> </td>
                            <td> <a style="width: 90px" onclick="onDelete(<?= $produto['id'] ?>)"><i class="fa-solid fa-trash"></i></a> </td>
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
            $('#btnDelete').attr('href', `produto.php?action=destroy&id=${id}`);
            $('#deleteModal').modal('show');

        }
    </script>

</body>

</html>