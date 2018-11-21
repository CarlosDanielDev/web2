<?php

require_once('db.class.php');

$cpf = $_POST['cpf'];

$objDb = new db();
$like = $objDb->conecta_mysql();

//validar CPF
function validaCPF($cpf)
{
    $digitoA = 0;
    $digitoB = 0;
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
        $digitoA += $cpf[$i] * $x;
    }

    for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
        if (str_repeat($i, 11) == $cpf) {
            return false;
        }
        $digitoB += $cpf[$i] * $x;
    }

    $somaA = (($digitoA % 11) < 2) ? 0 : 11 - ($digitoA % 11);
    $somaB = (($digitoB % 11) < 2) ? 0 : 11 - ($digitoB % 11);

    if ($somaA != $cpf[9] || $somaB != $cpf[10]) {
        return false;
    } else {
        return true;
    }
}

if (!validaCPF($cpf)) {
    echo 'CPF Inválido';
    die();
}


//verificar se cpf ja existe
$cpf_existe = false;
$sql = "SELECT * FROM usuarios WHERE login = '$cpf';";

if ($resultado_id = mysqli_query($like, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['login'])) {
        $cpf_existe = true;
    }

} else {
    echo 'Erro na hora de buscar os clientes';
}

if ($cpf_existe == true) {
    echo 'CPF já em uso';
    die();
}

$resultado_final = strtoupper(substr(bin2hex(random_bytes(8)), 1));

$senha = md5($resultado_final);

$sql = "INSERT INTO usuarios(login, senha) VALUES ('$cpf','$senha');";

//executar a query
if (mysqli_query($like, $sql)) {
    echo 'Sua senha é: ' . $resultado_final;
} else {
    echo 'Erro na hora de registar o cliente';
}
?>