<?php
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['adm'])) {
    header('Location: login.php');
}

$erro_cpf = isset($_GET['erro_cpf']) ? $_GET['erro_cpf'] : 0;
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Upload Arquivos</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.mask.min.js"></script>
    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600">
    <link rel="stylesheet" href="css/global.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cpf").mask("000.000.000-00");


            $('#btn_cadastrar').click(function () {

                if ($('#cpf').val().length > 0) {

                    $.ajax({

                        url: 'registra_usuario.php',

                        method: 'POST',

                        data: $('#form_cadastrar').serialize(),

                        success: function (data) {
                            $('#msg-alerta').html(data);
                            $('#cpf').val('');

                        }


                    });

                }

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
                <li><a href="sair.php" style="color: black">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">

    <div class="col-md-6">

        <h3>Cadastra Cliente</h3>
        <br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <form id="form_cadastrar" class="input-group">
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00"/>
                    <span class="input-group-btn">
                        <button id="btn_cadastrar" type="button" class="btn btn-default">Cadastra</button>
                    </span>
                </form>
            </div>
        </div>
        <samp id="msg-alerta" color="#FF0000"></samp>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><a href="procurar_pessoas.php">Procurar por pessoas</a></h4>
            </div>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
