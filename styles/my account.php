<?php 
require 'database.php';
require 'login.php';

$messages = get_messages();

$id = $_GET['id'];
$select_query = "SELECT * FROM users WHERE id = ?";
// 
$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
$row = $result;
$login = $row['login'];
$hash =  $row['password'];
$email = $row['email'];

}else {

}

review_account();
?>
<html>
<head>
<meta charset = "utf8">
<link rel="stylesheet" href="styles/styles.css">
 <link rel="stylesheet" href="styles/reset_styles.css">
</head>
<body>
<header>
	<div class="wrapper">

		<section class="menu">
<nav>
  <ul>
    <a href="index.php"><li>Home</li></a>
    <a href="destinations.php"><li>Our Destinations</li></a>
    <a href=""><li>About Us</li></a>
    <a href=""><li>Contacts</li></a>
  </ul>
</nav>
</section>
<?php if ($messages) { ?>
	<div class="messages">
		<?php foreach ($messages as $message) { ?>
			<div class="single-message"><?php print $message; ?></div>
		<?php } ?>
	</div>
<?php } ?>
	<div class="review_account">
		<div class="my_login"><?php print $login ?></div>
		<div class="my_email"><?php print $email ?></div>
	</div>

</div>
</header>
</body>
</html>