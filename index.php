<?php session_start(); ?>
<?php
require 'database.php';
require 'functions.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] :1;
$perpage =10;
$start = ($page>1) ? ($page*$perpage)-$perpage : 0;

$select_query = "SELECT SQL_CALC_FOUND_ROWS `c`.`id`,`c`.`title`,`c`.`content_pic`,`c`.`text`, `c`.`status`,`c`.`category`,`c`.`time`, `cat`.`cat_title` as `cat_title`
FROM content c
INNER JOIN categories cat ON c.category= cat.id
ORDER BY id DESC LIMIT $start, 10";

$db = database_connect();
$stmt = $db->prepare($select_query);
$stmt->execute(array());
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perpage);
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
    
<section class="top_header">
<!--<div id="open">Login</div>-->
  <section class="form">
    
    </section> 
   
  </section>   

<div class="greeting">
  <section class="hello">  
    
  </section>
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
<?php if ($result) {?>  
<div id="destinations_content">
<?php foreach ($result as $item) {?>
  <?php if($item['status']=='published') { ?>
    <div class="items">
      <div class="items_title">
        <a href="item_view.php?id=<?php print $item['id']; ?>">
          <?php print $item['title']?>
        </a>
        <br>
      </div>
      <div class="my_pic">
        <img src="<?php print $item['content_pic'] ?>" alt="">
      </div>          
      
      <div class="text">
        <?php 
            $item1 = $item['text']; 
            $item1 = strip_tags($item1); 
            print $item1 = substr($item1, 0, 150) . "...";
            //$item1 = substr($item1, 0, strrpos($item1, ' ')); 
            //echo $item1 ."… "; 
        ?>
      </div> 
      <div class="time">
      <?php $created = !empty($item['time']) ? date('d.m.Y H:i', $item['time']) : '';
        print $created;
      ?>      
      </div>
       <div class="cat_title">
        <p>Category: <?php print $item['cat_title'] ?></p>
      </div>     
    </div>        
<?php } ?>   
<?php } ?>    
<?php } else { ?>
  <div class="error">
  <h3>We do not have such items in our database</h3>
  </div>

<?php } ?>

</div>
<div class="pagination">
      <?php for($i=1;$i<=$pages;$i++):?>
      <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> 
    <?php endfor;?>     
  </div>   
    </div>   
</header>
</body>
</html>



