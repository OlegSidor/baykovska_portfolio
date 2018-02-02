<?php
session_start();
if (isset($_POST)) {
  if ($_SESSION["logined"]) {
    $file = fopen("../../publication/description/".$_POST["name"].".txt","w");
    fwrite($file,$_POST["text"]);
    fclose($file);
  }
} else {
  echo "Error.404";
}

?>
