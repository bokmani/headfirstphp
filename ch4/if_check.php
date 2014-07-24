<?php

$my_name = 'Buster';
$a_number = 3;
$a_decimal = 4.6;
$favorite_song = 'Trouble';
$another_number = 0;
$your_name = $my_name;


if($a_number == 3) echo 'true'; else echo 'false';
echo "\n";

if($another_number == "") echo 'true'; else echo 'false';
echo "\n";

if($favorite_song == "Trouble") echo 'true'; else echo 'false';
echo "\n";

if($my_name == '$your_name') echo 'true'; else echo 'false';
echo "\n";

if($my_name == "$your_name") echo 'true'; else echo 'false';
echo "\n";

if($your_name == $my_name) echo 'true'; else echo 'false';
echo "\n";

if($favorite_song == 'Trouble') echo 'true'; else echo 'false';
echo "\n";

if($a_number > 9) echo 'true'; else echo 'false';
echo "\n";

if($favorite_food = 'bamburger') echo 'true'; else echo 'false';
echo "\n";

?>