<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>DirtyBBQ - Download</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php
$files = glob("./*.apk");
foreach ($files as $file) {
    $filename = substr($file, strpos($file, "/") + 1);
    echo "<p><a href=\"$filename\">$filename</a></p>";
}
?>
</body>
</html>
