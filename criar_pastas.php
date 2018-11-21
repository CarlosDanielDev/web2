<?php
$resultado_final = strtoupper(substr(bin2hex(random_bytes(8)), 1));
mkdir(__DIR__ . '/arquivos/' . $resultado_final . '/', 0777, true);

?>