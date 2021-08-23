<?php
header('Content-Type: text/plain; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    exit;
}

$device = @$_POST['device'];
$image = $_POST['image'];

if (isset($device) && isset($image)) {
    $image_path = 'uploads/' . $device . '.jpg';
    $file = fopen($image_path, 'w');

    fwrite($file, base64_decode($image));
    fclose($file);

    http_response_code(201);
    exit;
} else {
    http_response_code(400);
    exit('Body should contain device and image identifiers.');
}
