<?php



header('Content-type:image/jpeg');

$image = new Imagick('IMG_1127.JPG');

$image->thumbnailimage(100, 100);

echo $image;
?>