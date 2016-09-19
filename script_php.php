<?php
function login(){
    $username = 'root';
    $password = 1234;
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $username_from = trim($_POST['username']);
      $username_password = trim($_POST['password']);
      if ($username_password == $password && $username_from == $username) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];  
      }
      else {
        print "Incorrect email or password";
      }
    }
  }
	?>



