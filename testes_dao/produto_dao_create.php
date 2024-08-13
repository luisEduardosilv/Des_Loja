<?php 

$novo_produto = [
    'titulo' => 'Coleção Livros do Harry Potter',
    'descricao' => 'É uma coleção muito legal',
    'preco' => '300.00'
];

include('../produto_dao.php');

echo "<p>Criando um novo produto</p>";

$created = create($novo_produto);

if ($created){
    echo "<p>Produto criado com sucesso</p>";
} else{
    echo "<p>Erro ao criar o produto</p>";
}

$produtos = all();

?>

<p>Lista de produtos no banco de dados</p>
<ul>

<?php foreach ($produtos as $produto) { ?>
<li><?= implode(';', $produto)?></li>
<?php } ?>
</ul>