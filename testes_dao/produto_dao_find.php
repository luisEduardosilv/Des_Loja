<?php  
include('../produto_dao.php');  

echo "<p>Procurando um produto</p>"; 
$produto = find(4);  

if (!$produto){     
    echo "<p>Produto não encontrado</p>";     
    exit; 
    }  
    ?>  
    
    <p>Dados do produto:</p> 
    <ul>     
    <?php foreach ($produto as $key => $value) { ?>         
    <li><b><?= $key?></b>: <?= $value ?></li>     
    <?php } ?> 
    </ul>