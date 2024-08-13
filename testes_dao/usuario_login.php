<?php 

$dados_login = [
    'email' => 'cleber@hotmail.com',
    'senha' => '123'
];

include('../usuario_dao.php');  

$usuario = findbyemail($dados_login['email']);

if($usuario){
    
if(md5($dados_login['senha']) == $usuario['senha']){
  echo 'Usuário e senha corretos!';
} else{
    echo 'Senha incorreta!';
}

} else{
    echo 'Usuário não cadastrado!';
}


?>