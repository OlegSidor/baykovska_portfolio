<meta charset="utf-8">
<?php
if(isset($_POST)){
$sign = "jjahhs23hhsjasdks";
$secret = $_POST["secret"];
if($secret == md5($sign)){
  $src;
  $folder = $_POST["folder"];
    if(isset($_FILES["files"])){
  $mysqli = new mysqli("***","***","*","***");
  $mysqli -> query("SET NAME 'utf8'");
  $file_name = $_FILES["files"]["name"];
  $file_error = $_FILES["files"]["error"];
  $file_type = $_FILES["files"]["type"];
  $file_tmp = $_FILES["files"]["tmp_name"];
      for ($i=0; $i < count($file_name); $i++) {
    if ($file_error[i] == 0) {
      $type = explode("/", $file_type[$i]);
      if($type[0] == "image"){
        $name = 0;
        while(file_exists("../../$folder/img/$name.$type[1]")){
          $name++;
        }
        $src = "/$folder/img/$name.$type[1]";
        move_uploaded_file($file_tmp[$i],"../../$folder/img/$name.$type[1]");
        $mysqli -> query("INSERT INTO `$folder`(`src`) VALUES ('$src')");
      } else {
        exit("Тільки картинки");
      }
    } else {
      exit("Помилка при завантаженні файла $file_name[$i]<br>");
    }
  }
  } else {
     exit("Файл не найдено");
   }
   echo "Картинка/и успішно додано<br>";
   echo "<a href='/admin/'>Назад</a>";
} else
echo "ERROR";
} else{
  echo "ERROR";
}
?>
