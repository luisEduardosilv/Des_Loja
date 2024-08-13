<?php
include('../usuario_dao.php');

echo "<p>consulta de Email</p>";
$email = findByEmail('etc@gmail.com');


if (!$email) {
    echo "<p>email não encontrado</p>";
    exit;
}
?>

<p>Dados do usuario:</p>
<ul>
    <?php foreach ($email as $key => $value) { ?>
        <li><b><?= $key ?></b>: <?= $value ?></li>
    <?php } ?>
</ul>