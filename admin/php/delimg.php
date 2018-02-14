<meta charset="utf-8">
<?php
if (isset($_POST)) {
  $sign = "jjahhs23hhsjasdks";
  $secret = $_POST["secret"];
  if($secret == md5($sign)){
$folder =  $_POST["folder"];
$mysql = new mysqli("***","***","*","***");
$mysql -> query("SET NAME 'utf8'");
$srcRAW = explode(",",$_POST["list"]);
for ($i=0; $i < count($srcRAW); $i++) {
  $src= explode("?",$srcRAW[$i]);
  if(unlink("../..$src[0]")){
    $mysql -> query("DELETE FROM `$folder` WHERE `src` = '$src[0]'");
  } else {
  echo "Помилка при видаленні $src[0]<br>";
  }
}
echo "Всі файли видалені<br>";
echo "<a href='/admin/'>Назад</a>";
} else
echo "ERROR";
} else
echo "ERROR";
?>
