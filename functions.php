<?php
 
  require_once 'database.php';
function set_message($message = '') {
  if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = array();
}
  if (array_search($message, $_SESSION['messages']) === FALSE) {
    $_SESSION['messages'][] = $message;
}
  return $_SESSION['messages'];
}

//end set_message

function get_messages() {
  $messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
  unset($_SESSION['messages']);
  return $messages;
}

//end get_messages

function create_content($title, $text, $content_pic, $category) {

  $title = trim($title);
  $text = trim($text);
  $category= $category;
 
  if (!empty($content_pic)) {
    if ($content_pic ["error"] == UPLOAD_ERR_OK) {
      $uploads_dir = __DIR__ . '/files';
          $tmp_name = $content_pic ["tmp_name"];
          $name = $content_pic ["name"];
          if (move_uploaded_file($tmp_name, "{$uploads_dir}/{$name}")) {
            $content_pic = "files/{$name}";
          }
    }
  } 

  $db = database_connect();
  /*if ($id) {
  $stmt = $db->prepare("UPDATE INTO content (id, title,text) VALUES (?, ?, ?)");
  $stmt -> execute(array($title ,$text, $id ));
  }
  else {*/

  $stmt = $db->prepare("INSERT INTO content (`title`, `text`,`content_pic`, `category`,  `time`) VALUES (?, ?, ?, ?, ?)"); 
  $stmt -> execute(array($title, $text, $content_pic, $category, time()));  
  
  header("Location: review.php?id=" . $insertId=$db->lastInsertId());
  exit();

}

//end create content



