<?php
define("HOST_WWW_ROOT", "var/www/project/");
define("SITE_ROOT", "var/www/project/");
define("DATABASE_HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "998877");
define("DATABASE_NAME", "project");


function database_connect(){
$connection_string = "mysql:host=" . DATABASE_HOST . ';dbname=' . DATABASE_NAME;
$db = new PDO($connection_string, USERNAME, PASSWORD);
return $db;
}

