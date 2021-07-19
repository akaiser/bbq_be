<?php
$device = @$_GET['device'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?= $device ?></title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
if (!isset($device) || $device == '') {
    print('missing device param!');
} else {
    $image = 'uploads/' . $device . '.jpg';
    if (!file_exists($image)) {
        print 'device does not exist!';
    } else {
        $time = (int)round(microtime(true) * 1000);
        echo '<div style="float: left">';
        echo '<img style="width: 100%" alt="' . $device . '" src="' . $image . '?time=' . $time . '">';
        echo '</div>';
        ?>

        <script type="text/javascript">
            const image = document.querySelector('img');

            function reload() {
                const time = new Date().getTime();
                const source = image.getAttribute('src');
                const originSource = source.substr(0, source.indexOf('?'));
                image.setAttribute('src', originSource.concat('?time=' + time));
            }

            document.addEventListener('DOMContentLoaded', () => setInterval(reload, 2000), false);
        </script>
        <?php
    }
}
?>
</body>
</html>
