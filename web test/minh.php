<?php 

define("DB_SERVER", "localhost:8080");
define("DB_USER", "root");
define("DB_PASSWORD", "NO");
define("DB_DATABASE", "sdlcweb");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


if (!$connect) {
	echo('Connection failed!');
}
else {echo('ok');}
 
?>