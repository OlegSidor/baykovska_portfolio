<?php
if(isset($_POST)){ // провіряємо чи є хотяби якісь данні
  $page = $_POST["page"];
  $img = scandir("../$page");
    echo json_encode(array_slice($img,2)); // відправляємо масив з усіма файлами у папці
  }
 ?>
