<?
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['adm'])) {
    header('Location: index.php?erro=1');
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Twitter clone</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script type="text/javascript">

        $(document).ready(function () {

            function atualizaUsuarios() {

                //carregar usuarios cadastrados

                $.ajax({

                    url: 'get_usuarios.php',

                    success: function (data) {

                        $('#usuarios_cadastrados').html(data);

                        $('.btn-gerasenha').click(function () {
                            var id_usuario = $(this).data('id_usuario');

                            $.ajax({
                                url: 'nova_senha.php',
                                method: 'post',
                                data: {
                                    id_usuario: id_usuario
                                },
                                success: function (data) {
                                    alert('Sua senha nova é: ' + data);
                                }
                            });
                        });

                    }

                });

            }

            atualizaUsuarios();
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
                <li><a href="upload_arquivos.php" style="color: black">Upload Arquivos</a></li>
                <li><a href="sair.php" style="color: black">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div id="usuarios_cadastrados" class="list-group"></div>
    </div>
    <div class="col-md-3"></div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>