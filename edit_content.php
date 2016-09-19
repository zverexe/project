<?php
require_once 'database.php';
require 'functions.php';


$id = $_POST['id'];
$select_query = "SELECT id, title, text, content_pic
FROM content WHERE id = ?";

$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
$row = $result;

$title = $row['title'];
$text =  $row['text'];
$content_pic =  $row['content_pic'];
}else {

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="styles/styles.css">
  		<link rel="stylesheet" href="styles/reset_styles.css">
</head>
<body>
	<header>
	<div class="wrapper">
		<section class="menu">
		<div class="add_content_edit">
      <a href="add_content.php">Add Content here</a>
    </div>
<nav>
  <ul>
  <a href="index.php"><li>Our Articles</li></a>
    <a href=""><li>About Us</li></a>
    <a href=""><li>Contacts</li></a>
  </ul>

</nav>
</section>
<div class="content_area">		
			<section class="add_content_form">
				<form action="update_content.php" method="POST" id="content_form" enctype="multipart/form-data">
					<div class="content_text">

					<p><label for="title">Title:</label></p>
					<input type="text" name="title" value="<?php print $title; ?>"></div>
					
					<div class="content_textarea">
					<p><label for="text">Text</label></p>
					<textarea name="text" id="text" cols="30" rows="20" form="content_form">
					<?php print $text ?>	
					</textarea></div>
					<input type="hidden" value="<?php  print $id; ?>" name="id"/>
					<div class='add_image'><input type="file"name="content_pic"></div>
					<div class="submit_content"><input type="submit" value="Update"></div>
				</form>
				 <form action="remove.php" method="POST" id="remove_form">
      <input type="hidden" value="<?php print $id; ?>" name="id"/>
      <div><input type="submit" value="Remove" name="eraser"></div>
    </form>
			</section>
		
	</div>
</div>
    </header>

</body>
</html>