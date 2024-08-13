<?php  
include('../usuario_dao.php');  

echo "<p>Procurando por usuário</p>"; 
$email = findbyemail('a@b.com');  

if (!$email){     
    echo "<p>Usuário não encontrado</p>";     
    exit; 
    }  
    ?>  
    
    <p>Usuário encontrado!</p>
    <p>Dados do usuário:</p> 
    <ul>     
    <?php foreach ($email as $key => $value) { ?>         
    <li><b><?= $key?></b>: <?= $value ?></li>     
    <?php } ?> 
    </ul>