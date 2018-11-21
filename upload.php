<?php
header('Content-Type: application/json');

$allowed = ['mp4', 'png', 'jpg', 'rar'];
$processed = [];

foreach ($_FILES['files']['name'] as $key => $name) {
    if ($_FILES['files']['error'][$key] === 0) {

        $temp = $_FILES['files']['tmp_name'][$key];

        $ext = explode('.', $name);
        $ext = strtolower(end($ext));

        $file = uniqid('', true) . time() . '.' . $ext;

        $resultado_final = strtoupper(substr(bin2hex(random_bytes(8)), 1));
        mkdir(__DIR__ . 'uploads/' . $resultado_final . '/', 0777, true);

        if (in_array($ext, $allowed) && move_uploaded_file($temp, 'uploads/' . $resultado_final . '/' . $file)) {
            $processed[] = array(
                'name' => $name,
                'file' => $file,
                'uploaded' => true
            );
        } else {
            $processed[] = array(
                'name' => $name,
                'uploaded' => false
            );
        }
    }
}

echo json_encode($processed);

?> 