<meta charset="utf-8">
<?php
if (isset($_POST)) {
  $sign = "jjahhs23hhsjasdks";
  $secret = $_POST["secret"];
  if($secret == md5($sign)){
    $folder =  $_POST["folder"];
    $mysql = new mysqli("***","***","*","***");
    $mysql -> query("SET NAME 'utf8'");
    $items = $mysql -> query("SELECT `src` FROM `$folder`");
    $count = $items -> num_rows;
    $name = array();
    $srcs = explode(",",$_POST["list"]);
    for ($i=0; $i <$count ; $i++) {
          $type = explode(".",$srcs[$i]);
          array_push($name,uniqid());
          rename("../..$srcs[$i]","../../$folder/img/$name[$i].$type[1]");
    }
    for ($i=0; $i <$count ; $i++) {
      $type = explode(".",$srcs[$i]);
      rename("../../$folder/img/$name[$i].$type[1]","../../$folder/img/$i.$type[1]");
    }
    echo "Картинка/и успішно переміщено<br>";
    echo "<a href='/admin/'>Назад</a>";
  } else echo "ERROR";
} else echo "ERROR";
?>
