<?php 
require_once 'database.php';
require_once 'functions.php';

$id = $_POST['id'];
$title = trim($_POST['title']);
$text = trim($_POST['text']);
if (!empty($_FILES["content_pic"])) {
		if ($_FILES["content_pic"]["error"] == UPLOAD_ERR_OK) {
			$uploads_dir = __DIR__ . '/files';
	        $tmp_name = $_FILES["content_pic"]["tmp_name"];
	        $name = $_FILES["content_pic"]["name"];
	        if (move_uploaded_file($tmp_name, "{$uploads_dir}/{$name}")) {
	        	$content_pic = "files/{$name}";
	        }
		}
	} 
 
$db = database_connect();
// $id = $_SESSION['user_id'];
$select_query = "SELECT author FROM content WHERE id = ?";
// 
$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

 
  $stmt = $db->prepare("UPDATE content SET title = ?, text= ?, content_pic = ? WHERE id = ? ");
   //$stmt->bindValue(':id', $id);
  //$stmt->bindValue(':title', $title);
   //$stmt->bindValue(':text', $text);
  //$stmt -> execute();
  
  $stmt->execute(array($title ,$text, $content_pic, $id));
  header("Location: item_view.php?id=" . $id);
  exit();
