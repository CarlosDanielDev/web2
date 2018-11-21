<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

require_once('db.class.php');

$objDb = new db();
$like = $objDb->conecta_mysql();

$sql = "SELECT * FROM usuarios ORDER BY id;";


$resultado_id = mysqli_query($like, $sql);

if ($resultado_id) {
    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
        echo '<a href="#" class="list-group-item">';

        echo '<strong>' . $registro['login'] . '</strong>';

        echo '<p class="list-group-item-text pull-right">';
        echo '<button type="button" class="btn btn-default btn-gerasenha" data-id_usuario="' . $registro['id'] . '">Senha Nova</button>';
        echo '</p>';
        echo '<div class="clearfix"></div>';

        echo '</a>';

    }
} else {
    echo 'Erro na consuta dos usuarios do BDs';
}
?>