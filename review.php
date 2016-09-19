<?php
  require_once 'database.php';
  require_once 'functions.php';

  $id = $_GET['id'];
  $select_query = "SELECT title,text,content_pic,time
FROM content c
WHERE c.id = ?";
 
 
  $db = database_connect();
  $stmt = $db->prepare($select_query);
  $stmt->execute(array($id));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    $row = $result;
    $title = $row['title'];   
    $text =  $row['text'];
    $user_pic = $row['content_pic'];
    $created = !empty($row['time']) ? date('d.m.Y H:i', $row['time']) : '';
        
  }
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
        <div class="add_content_edit">
          <a href="add_content.php">Add Content here</a>
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
        <?php if ($result) {?>
          <div id="destinations_content">
            <div class="items">
		          <div class="items_title">
                <?php print $title ?>
              </div>
                <div class="my_pic"><img src="<?php print $user_pic ?>" alt="">
              </div>
                <?php print $text ?>
               
                <div class="created">
                <?php print $created ?>
                </div>  
                
              </div>
          </div>
        <?php } else { ?>
          <div class="error">
	           <h3>We do not have such items in our database</h3>
	        </div>
        <?php } ?>
      </div>
    </header>
  </body>
</html>