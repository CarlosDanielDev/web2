<?php

require_once('db.class.php');

$id_usuario = $_POST['id_usuario'];

$objDb = new db();
$like = $objDb->conecta_mysql();

$resultado_final = strtoupper(substr(bin2hex(random_bytes(8)), 1));

echo $resultado_final;
$senhanova = md5($resultado_final);

$sql = "UPDATE usuarios SET senha = '$senhanova' WHERE id = '$id_usuario';";

mysqli_query($like, $sql);

?>