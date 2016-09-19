<?php
require 'database.php';
$id = $_REQUEST['id'];
$select_query = "SELECT * FROM content WHERE id = ?";
// 
$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
$row = $result;
$title = $row['title'];
$text =  $row['text'];

}else {
die("Error");
}
?>
<html>
<head>
<meta charset = "utf8">
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<header>
	<div class="wrapper">
		<section class="menu">
<nav>
  <ul>
    <a href="index.php"><li>Home</li></a>
    <a href=""><li>Our Destinations</li></a>
    <a href=""><li>About Us</li></a>
    <a href=""><li>Contacts</li></a>
  </ul>
</nav>
</section>
<div id="destinations_content">
<div class="items">
		<div class="items_title"><?php print $title ?><br></div>
        <?php print $text ?></div>
        </div>
</div>
</header>
</body>
</html>