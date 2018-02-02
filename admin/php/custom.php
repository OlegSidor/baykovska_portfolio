<?php
session_start();
if(isset($_POST)){
  if ($_SESSION["logined"]) {
  $source = $_POST["source"];
  $number = $_POST["number"];
  $folder = $_POST["folder"];
  $_source = array();
  $name;
  $a = 0;
  for ($i=0; $i < count($source); $i++) {
    $name = uniqid();
       if(rename("../..".$source[$i],"../../".$folder."//".$name.".png")){$a++;}
       array_push($_source,$name);
  }
  $b = 0;
  for ($i=0; $i < count($_source); $i++) {
         if(rename("../../$folder/".$_source[$i].".png","../../".$folder."//".$number[$i].".png")){$b++;}
  }
  if($a == $b && $a == count($source)){
    echo "__OK__";
  } else {
    echo "__Error__";
  }
}
}else {
  echo "Error. 404";
}
 ?>
