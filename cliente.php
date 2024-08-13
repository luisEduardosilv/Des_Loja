<?php 

session_start();
include_once("cliente_dao.php");
$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $dados = $_GET;

    switch ($action) {

        case "index":
            $clientes = all();
            include('views/cliente_index.php');
            break;

        case "create":
            include('views/cliente_create.php');
            break;

            case "destroy": 
                delete($dados['id']);
                header("Location: cliente.php?action=index");
            break;

            case "show":
                $cliente = find($dados['id']);
                if ($cliente['url_imagem']){
                    $path = $cliente['url_imagem'];
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $cliente['url_imagem'] = $base64; 
                }
                include("views/cliente_show.php");
            break;

        case "edit":   
            $cliente = find($dados['id']);
            if ($cliente['url_imagem']){
                $path = $cliente['url_imagem'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $cliente['url_imagem'] = $base64; 
            }
            include("views/cliente_edit.php");
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = $_POST;

    switch ($action) {

        case "store":
            if(isset($_FILES['imagem']['name'])){
                $dados['url_imagem'] = uploadImageFile($_FILES['imagem']);
            } else {
                $dados['url_imagem'] = null;
            }
            create($dados);
            header("Location: cliente.php?action=index");
        break;

        case "update":
            edit($dados);
            if (isset($_FILES['url_imagem']['name']) 
            && $_FILES['url_imagem']['name']){
            $dados['url_imagem'] = uploadImageFile($_FILES['url_imagem']);
            $endereco_antigo = find($dados['id'])['url_imagem'];
            unlink($endereco_antigo);
            editImagemById($dados['url_imagem'], $dados['id']);
        }
            header("Location: cliente.php?action=index");
        break;
    }
}