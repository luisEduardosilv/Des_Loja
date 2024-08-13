<?php

include_once("config/db_connection.php");

/**
 * A função create($usuario) recebe os dados de usuario e os cadastra no database 
 *@param array dados de usuario
 *@return bool cadastrado com sucesso
 */

function create(array $usuario): bool
{
    $conn = get_connection();
    $sql = 'INSERT INTO usuario(email, senha, nome, data_nascimento) VALUES (?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssss',
        $usuario['email'],
        $usuario['senha'],
        $usuario['nome'],
        $usuario['data_nascimento']
    );
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function findbyemail(string $email): array{
    $conn = get_connection(); 
    $sql = 'SELECT * FROM usuario WHERE email = ?'; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); 
    $stmt->execute(); 
    $instance = [];
    $result = $stmt->get_result(); 
    if ($row = $result->fetch_assoc()) {
    $instance = $row;
    } 
    $stmt->close(); 
    $conn->close(); 
    return $instance;
}

function edit(array $usuario) : bool {
    $conn = get_connection();
    $sql = 'UPDATE usuario SET nome = ?, data_nascimento = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param(
        "ssi",
        $usuario['nome'],
        $usuario['data_nascimento'],
        $usuario['id']);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();
        return $success;
}

function editSenhaById($id, $senha) : bool {
    $conn = get_connection();
    $sql = "UPDATE usuario SET senha = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "si",
        $senha,
        $id
    );
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

?>