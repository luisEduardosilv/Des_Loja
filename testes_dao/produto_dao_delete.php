<?php

include('../produto_dao.php');

echo "<p>Procurando um produto</p>";
$id = 4;
$produto = find($id);
if (!$produto){
    echo "<p>Produto não encontrado</p>";
    exit;
}

echo "<p>Deletando um produto</p>";
$deleted = delete($id);

if (!$deleted){
    echo "<p>O produto não pode ser deletado ou não existe</p>";
    exit;
}

echo "<p>Produto deletado com sucesso</p>";

$found = find($id);

if (!$found){
    echo "<p>O produto já não foi encontrado na base de dados</p>";
    exit;
}
?>