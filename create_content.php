<?php
require_once 'database.php';
require_once 'functions.php';



$id = isset($_POST['id']) ? $_POST['id'] : NULL; 
create_content($_POST['title'], $_POST['text'], $_FILES['content_pic'], $_POST['category']);

