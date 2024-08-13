<?php 

include_once("config/db_connection.php");

function all(): array {
    $conn = get_connection();
    $sql = 'SELECT id, nome, cpf, cep, email, url_website, url_imagem FROM cliente';
    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $instances = [];
    $result = $stmt -> get_result();
    while ($row = $result -> fetch_assoc()){
    $instances [] = $row;
    }

    $stmt -> close();
    $conn -> close();
    return $instances;
}

function create(array $cliente): bool
{
    $conn = get_connection();
    $sql = 'INSERT INTO cliente(nome, cpf, cep, email, url_website, url_imagem) VALUES (?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssss',
        $cliente['nome'],
        $cliente['cpf'],
        $cliente['cep'],
        $cliente['email'],
        $cliente['url_website'],
        $cliente['url_imagem']
    );
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function find(int $id) : array { 
    $conn = get_connection(); 
    $sql = 'SELECT id, nome, cpf, cep, email, url_website, url_imagem  FROM cliente WHERE id = ?'; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 
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

function edit(array $cliente) : bool {
    $conn = get_connection();
    $sql = 'UPDATE cliente SET nome = ?, cpf = ?, cep = ?, email = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param(
        "siisi",
        $cliente['nome'],
        $cliente['cpf'],
        $cliente['cep'],
        $cliente['email'],
        $cliente['id']);
        $stmt->execute();
        $success = $stmt->affected_rows > 0;
        $stmt->close();
        $conn->close();
        return $success;
}

function delete(int $id) : bool {        
    $conn = get_connection();
    $sql = 'DELETE FROM cliente WHERE id = ?';    
    $stmt = $conn->prepare($sql);    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

function uploadImageFile(array $file): string {
    $filename = $file['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $new_filename = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);
    $image_url = 'images/' . $new_filename . '.' . $ext;
    move_uploaded_file($file['tmp_name'], $image_url);
    return $image_url;

}

function editImagemById(string $url_imagem, int $id): bool{
    $conn = get_connection();
    $sql = 'UPDATE cliente SET url_imagem = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $url_imagem, $id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    $conn->close();
    return $success;
}

?>