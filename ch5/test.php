<?php

$file = 'images/test1.jpg';
$dir = dirname($file);

echo $dir;

var_dump(is_file('images/test1.jpg')) . "\n";
var_dump(file_exists($dir)) . "\n";
var_dump(mkdir($dir)) . "\n";
?>