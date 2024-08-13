<?php

include('../produto_dao.php');

echo "<p>Procurando um produto</p>";
$id = 4;
$produto = find($id);

if (!$produto){
    echo "<p>Produto não encontrado</p>";
    exit;
}
echo "<p>Produto encontrado</p>";

echo "<p>Editando o título do produto</p>";
$produto['titulo'] = 'Coleção Livros do Harry Potter Capa Dura';
$produto['preco'] = '500';
$edited = edit($produto);

if (!$edited){
    echo "<p>O produto não foi editado ou não existe</p>";
    exit;
}

echo "<p>Produto editado</p>";
echo "<p>Procurando o produto editado</p>";
$produto_editado = find($id);
?>

<p>Dados do produto editado:</p>
<ul>
    <?php foreach ($produto_editado as $key => $value) { ?>
        <li><b><?= $key?></b>: <?= $value ?></li>
    <?php } ?>
</ul>