<meta charset="utf-8">
<?php
$mysqli = new mysqli("***","***","*","***");
$mysqli -> query("SET NAME 'utf8'");
$newdesc = $_POST["desc"];
$src = $_POST["srcs"];
for ($i=0; $i < count($newdesc); $i++) {
  if(!$mysqli -> query("UPDATE `publication` SET `desctiption`='$newdesc[$i]' WHERE `src`='$src[$i]'")){
    echo "Помилка при додаванні описання до $src[$i] <br>";
  }
}
echo "Описання успішно оновлено<br>";
echo "<a href='/admin/'>Назад</a>";
?>
