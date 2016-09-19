<?php if (empty($_SESSION['login'])) { ?>
<section class="top_header">
<!--<div id="open">Login</div>-->
  <section class="form">
    <form action="index.php" method="POST">
      <label for="username">Username
        <input type="text" name="username">
      </label>
      <label for="password">Password
        <input type="password" name = "password">
      </label>
      <input type="submit" value="Login">
    </form>
    </section>
   

  </section>
   
<?php } else { ?>
<div class="greeting">
  <section class="hello">
  
    <h3>Hello, <?php print $_SESSION['login']; ?>! <a href="logout.php">Log out</h3>

  </section>
  <div class="add_content">
      <a href="add_content.php">Add Content here</a>
    </div>
    </div>
<?php } ?>