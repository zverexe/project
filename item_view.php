<?php
require_once 'database.php';
require 'functions.php';

/*$id =$_GET['id'];
$select_query = "SELECT id, title, text 
FROM content WHERE id = ?";

$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array($id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
$row = $result;

$title = $row['title'];
$text =  $row['text'];

}else {

}*/
$id = $_GET['id'];
$select_query = "SELECT `c`.`title`,`c`.`content_pic`,`c`.`text`,`c`.`status`,`c`.`category`, `c`.`time`, `cat`.`cat_title` as `cat_title`
FROM content c
INNER JOIN categories cat ON c.category= cat.id
WHERE c.id =?";

  $db = database_connect();
  $stmt = $db->prepare($select_query);
  $stmt->execute(array($id));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if ($result) {
    $row = $result;
    $title = $row['title'];
    $content_pic =  $row['content_pic'];
    $text =  $row['text'];
    $category=  $row['cat_title'];
    $created = !empty($row['time']) ? date('d.m.Y H:i', $row['time']) : '';
    
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
      
  <div class="greeting">    
    <div class="add_content">
      <a href="add_content.php">Add Content here</a>
    </div>
  </div>
    <section class="menu">
      <nav>
          <ul>           
            <a href="index.php"><li>Our Articles</li></a>
            <a href=""><li>About Us</li></a>
            <a href=""><li>Contacts</li></a>
          </ul>
      </nav>
    </section>    
       
    <section class="edit_forms">
    <form action="remove.php" method="POST" id="remove_form_view">
      <input type="hidden" value="<?php print $id; ?>" name="id"/>
      <div><input type="submit" value="Remove" name="eraser"></div>
    </form>
    <form action="edit_content.php" method="POST" id="edit_form">
      <input type="hidden" value="<?php print $id; ?>" name="id"/>
      <div><input type="submit" value="Edit" name="eraser"></div>
    </form>
    </section>
    
<?php if ($result) {?>
    <div id="destinations_content">
      <div id="item_view">
        <div class="items">
          <div class="items_title">         
            <?php print $title ?>         
          <br>
          </div>
          <div class="my_pic"><img src="<?php print $content_pic ?>" alt="">
              </div>
            <?php print $text ?>            
              <br>
               <p>Category: <?php print $category ?></p>
              <br>              
              <?php print $created?>
            </div>             
          </div>
      </div>   
      <?php } else { ?>
        <div class="error">
          <h3>We do not have such items in our database</h3>
        </div>
      <?php } ?>
    </div>
  </div>    
</header>
</body>
</html>