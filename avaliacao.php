<?php 

session_start();

// se o usuario n estiver logado
if(!isset($_SESSION['logado'])){
    header('Location: usuario.php?action=login');
    exit();
}

include_once("avaliacao_dao.php");

if (!isset($_GET['action'])){
    echo "Bad Request";
    http_response_code(400);
    exit;
}

$action = $_GET['action'];    

if ( $_SERVER['REQUEST_METHOD'] == 'GET'){

    $dados = $_GET;

    switch ($action) {

        case "index":
        $avaliacoes= all();
        include('views/avaliacao_index.php');
        break;

        case "create":
        include("views/avaliacao_create.php");
        break;

        case "destroy":            
            delete($dados['id']);
            header("Location: avaliacao.php?action=index");
        break;

        case "show":
            $avaliacao = find($dados['id']);
            if ($avaliacao['url_imagem']){
                $path = $avaliacao['url_imagem'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                if (file_exists($path)){
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $avaliacao['url_imagem'] = $base64;
                }
            }
            include("views/avaliacao_show.php");
            break;

            case "edit":   
                $avaliacao = find($dados['id']);
                if ($avaliacao['url_imagem']){
                    $path = $avaliacao['url_imagem'];
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $avaliacao['url_imagem'] = $base64;
                }
                include("views/avaliacao_edit.php");
                break;
    } 
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dados = $_POST;
    
    switch ($action) {
    
        case "store":       
            if (isset($_FILES['imagem']['name'])&& $_FILES['imagem']['name']){
                $dados['url_imagem'] = uploadImageFile($_FILES['imagem']);
            } else {
                $dados['url_imagem'] = null;
            }
            create($dados);
            print_r($dados);
            header("Location: avaliacao.php?action=index");
         break;

         case "update":
            edit($dados);
            print_r($dados);
            if(isset($_FILES['imagem']['name']) && $_FILES['imagem']['name']){
                $dados['url_imagem'] = uploadImageFile($_FILES['imagem']);
                $enderecoAntigo = find($dados['id'])['url_imagem'];
                unlink($enderecoAntigo);
                editImagemById($dados['url_imagem'], $dados['id']);
            }
        header("Location: avaliacao.php?action=index");
        break;
    }
}
