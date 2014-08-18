<?php

if(extension_loaded('imagick'))
	echo 'asdfadfa';

if(extension_loaded('gd'))
	echo 'adfaaaaaa';
	return;

header('Content-type:image/jpeg');

$image = new Imagick('IMG_1127.JPG');

$image->thumbnailimage(100, 100);

echo $image;
?>