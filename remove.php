<?php
require 'database.php';


$id = $_POST['id'];
$db = database_connect();

//$delrows=$db->prepare("DELETE FROM content WHERE id = ?");
$delrows=$db->exec("DELETE FROM content WHERE id = $id");

header("Location: index.php");

?>