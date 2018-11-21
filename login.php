<?php

session_start();

unset($_SESSION['login']);

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Twitter clone</title>

    <!-- jquery - link cdn -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.mask.min.js"></script>
    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script>
        $(document).ready(function () {
            $("#campo_login").mask("000.000.000-00")
        });

        $(document).ready(function () {

            //verificar se CPF e senha foram devidamente preenchidos
            $('#btn_login').click(function () {

                var campo_vazio = false;

                if ($('#campo_login').val() == '') {
                    $('#campo_login').css({'border-color': '#A94442'});
                    campo_vazio = true;
                } else {
                    $('#campo_login').css({'border-color': '#CCC'});
                }
                if ($('#campo_senha').val() == '') {
                    $('#campo_senha').css({'border-color': '#A94442'});
                    campo_vazio = true;
                } else {
                    $('#campo_senha').css({'border-color': '#CCC'});
                }

                if (campo_vazio) return false;
            });
        });
    </script>

</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top" style="background: yellow">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="imagens/icone.png"/>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" style="color: black">Voltar para Home</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">

    <br/><br/>

    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3>Login</h3>
        <br/>
        <form method="post" action="validar_acesso.php" id="formLogin">
            <div class="form-group">
                <input type="text" class="form-control" id="campo_login" name="login" placeholder="CPF"/>
            </div>

            <div class="form-group">
                <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha"/>
            </div>

            <button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

            <br/><br/>

        </form>
        <?php
        if ($erro == 1) {
            echo '<font color="#FF0000">CPF e ou Senha inválido(s)</font>';
        }
        ?>

    </div>
    <div class="col-md-4"></div>

    <div class="clearfix"></div>
    <br/>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>

</div>


</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>