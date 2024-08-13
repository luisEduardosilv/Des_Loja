<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">DES Loja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <?php
                if (isset($_SESSION['logado'])) { ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="produto.php?action=index">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuario.php?action=edit">Usuário</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="avaliacao.php?action=index">avaliações</a>
                        </li>
                        <li class="nav-item">
                    <a class="nav-link" href="cliente.php?action=index">Cliente</a>
                    </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link"><?= $_SESSION['usuario']['email'] ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="usuario.php?action=logout">Logout</a>
                        </li>
                    </ul>

                <?php } ?>


            </div>
        </div>
    </nav>
</header>