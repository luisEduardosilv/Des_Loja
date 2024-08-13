<?php 
include('db_connection.php');

try{
  echo 'Abrindo a conexão.<br>';
  $conn = get_connection();
  echo 'Conexão realizada com sucesso.<br>';

  echo 'Fechando a conexão.<br>';
  $conn->close();
  echo 'Conexão fechada.';

} catch(mysqli_sql_exception $e){
    echo 'Houve um problema ao iniciar a conexão com a base de dados.<br>';
    echo $e;
}

?>