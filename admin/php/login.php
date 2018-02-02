<?php
session_start();
if(isset($_POST)){
  if($_POST["type"]=="login"){
    $pass = md5($_POST["pass"]);
    $login = $_POST["login"];
    $stay = $_POST["stay"];
    if($login == "demirajka" && $pass == "2721e8d4df3162c474a0b1c867705eae"){
      echo file_get_contents("../adminform.html");
      $_SESSION["logined"] = true;
      if($stay == "true") $_SESSION["stay"] = true;
  } else {
    echo "error";
  }
}
//******************//
if($_POST["type"]=="autologin"){
  if($_SESSION["stay"] == true && $_SESSION["logined"] == true){
    echo file_get_contents("../adminform.html");
    $_SESSION["logined"] = true;
  }
}


if($_POST["type"]=="exit"){
  $_SESSION["logined"] = false;
  $_SESSION["stay"] = false;
}


}
?>
