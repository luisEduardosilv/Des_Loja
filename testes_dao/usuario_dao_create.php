<?php

$usuario = [
    'email' => 'cleber@hotmail.com',
    'senha' => '123',
    'nome' => 'Cleber Silva',
    'data_nascimento' => '2003-08-23'
];
$usuario['senha'] = md5($usuario['senha']);


include('../usuario_dao.php');

create($usuario);
?>