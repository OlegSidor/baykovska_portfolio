<?php
session_start();
if(isset($_POST)){ // провіряємо чи є хотяби якісь данні
  if ($_SESSION["logined"]) { //Провірка чи було здійснено вхід в систему
  if(isset($_POST["list"])){ // якщо прийшов запит з атрибутом "list"
    echo json_encode(array_slice(scandir("../../$_POST[folder]"),1)); // відправляємо масив з усіма файлами у папці
  }
  if(isset($_POST["delete"])){ // якщо прийшов запит з атрибутом "delete"
   if(!unlink("../../".$_POST["delete"])){ // пробуємо видалити файл
   echo "_Error_";
   } else {
   echo "_success_";
   }
  }
}
}




?>
