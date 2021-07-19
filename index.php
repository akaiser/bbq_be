<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>BBQ</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<a target="_blank" href="release/index.php"><p>download</p></a>

<div id="devices">
    <?php
    $images = glob("uploads/*.jpg");
    $time = (int)round(microtime(true) * 1000);

    foreach ($images as $image) {
        $device = substr($image, strpos($image, '/') + 1, -4);
        echo '<div class="gallery">';
        echo '<a target="_blank" href="detail.php?device=' . $device . '">';
        echo '<img alt="' . $device . '" src="' . $image . '?time=' . $time . '">';
        echo '</a>';
        echo '<div class="desc">' . $device . '</div>';
        echo '</div>';
    }
    ?>
</div>

<script type="text/javascript">
    const images = document.getElementById('devices').querySelectorAll('img');

    function reload() {
        const time = new Date().getTime();

        images.forEach(image => {
            const source = image.getAttribute('src');
            const originSource = source.substr(0, source.indexOf('?'));
            image.setAttribute('src', originSource.concat('?time=' + time));
        });
    }

    document.addEventListener('DOMContentLoaded', () => setInterval(reload, 2000), false);
</script>

</body>
</html>
