<?php
session_start();
include_once("usuario_dao.php");

if (!isset($_GET['action'])) {
    echo "Bad Request";
    http_response_code(400);
    exit;
}

$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $dados = $_GET;

    switch ($action) {

        case "create":
            include('views/usuario_create.php');
            break;

        case "login":
            include('views/usuario_login.php');
            break;

        case "edit":
            $usuario = $_SESSION['usuario'];
            include("views/usuario_edit.php");
            break;

        case "destroy":
            $id = $dados['id'];
            delete($id);
            header("Location: produto.php?action=index");
            break;

            case 'logout':
                session_destroy();
                header('Location: usuario.php?action=login');
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = $_POST;

    switch ($action) {

        case "store":
            $dados['senha'] = md5($dados['senha']);
            create($dados);
            header("Location: usuario.php?action=login");
            break;

        case "update":
            edit($dados);
            if ($dados['senha'] != ''){
                $dados['senha'] = md5($dados['senha']);
                editSenhaById($dados['id'], $dados['senha']);
            }
            $_SESSION['usuario'] = findbyemail($_SESSION['usuario']['email']);
            header("Location: produto.php?action=index");
            break;

        case 'login':
            $usuario = findbyemail($dados['email']);
            if ($usuario) {

                if (md5($dados['senha']) == $usuario['senha']) {
                    echo 'Usuário e senha corretos!';
                    $_SESSION['logado'] = true;
                    $_SESSION['usuario'] = $usuario;
                    header('Location: produto.php?action=index');
            } else {
                unset($_SESSION['logado']);
                unset($_SESSION['usuario']);
                $_SESSION['erro_usuario_login'] = 'Senha incorreta';
                header('Location: usuario.php?action=login');
            }
            break;
    }
    else {
                $_SESSION['erro_usuario_login'] = 'usuario não cadastrado';
                header('Location: usuario.php?action=login');
    }
}
}