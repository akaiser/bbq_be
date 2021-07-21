<?php
header('Content-Type: text/plain; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    exit;
}

$device = @$_POST['device'];
if (isset($device)) {
    $image = $_POST['image'];

    $image_path = 'uploads/' . $device . '.jpg';
    $file = fopen($image_path, 'w');
    fwrite($file, base64_decode($image));
    fclose($file);

    //$orientation = $_POST['orientation'];
    //$rotated = imagerotate(imagecreatefromjpeg($image_path), $orientation == 'portrait' ? 0 : 0, 0);
    //imagejpeg($rotated, $image_path);

    http_response_code(201);
    exit;
} else {
    http_response_code(400);
    exit('Body should contain image, device and orientation identifiers.');
}
