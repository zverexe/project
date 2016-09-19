<?php
require 'database.php';
require 'functions.php';


$select_query = "SELECT id, cat_title 
FROM categories ORDER BY id";

$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array());
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
				<form action="create_content.php" method="POST" id="content_form" enctype="multipart/form-data" >
					<div class="content_text">
					<p><label for="title">Title:</label></p>
					<input type="text" name="title" value=""></div>					
					<div class="content_textarea">
					<p><label for="text">Text</label></p>
					<textarea name="text" id="text" cols="30" rows="20" form="content_form">	
					</textarea></div>
					<p><label for="text">Add image</label></p>
					<div class='add_image'><input type="file" name="content_pic"></div>					
						<select name="category">
							<?php foreach ($result as $item) {?>
							<option value="<?php print $item['id'] ?>"><?php print $item['cat_title'] ?>								
							</option>
							
							<?php }?>  
						</select>					 					
					<div class="submit_content"><input type="submit" value="Send"></div>
				</form>
			</section>
		
	</div>
</div>
    </header>

</body>
</html>