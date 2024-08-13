<?php

include('../produto_dao.php');

$produtos = all();

//print_r($produtos);

?>

<p>Lista de produtos no banco de dados:</p>
<ul>
<?php foreach ( $produtos as $produto ) { ?>
<li><?= implode(';', $produto)?></li>
<?php } 
?>
</ul>