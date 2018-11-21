<?php

session_start();

require_once('db.class.php');

$login = $_POST['login'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha';";

$objDb = new db();
$like = $objDb->conecta_mysql();

$resultado_id = mysqli_query($like, $sql);

if ($resultado_id) {
    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['login'])) {
        if ($dados_usuario['adm'] == '1') {

            $_SESSION['login'] = $dados_usuario['login'];
            $_SESSION['adm'] = $dados_usuario['adm'];

            header('Location: upload_arquivos.php');

        } else {

            $_SESSION['login'] = $dados_usuario['login'];

            header('Location: espaco_user.php');

        }
    } else {
        header('Location: login.php?erro=1');
    }
} else {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}

?>