<?php
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['adm'])) {
    header('Location: index.php?erro=1');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>cliente</title>
</head>
<body>
cliente
</body>
</html>