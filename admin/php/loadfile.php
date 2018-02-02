<?php
session_start();
 if(isset($_FILES)){ // провіряємо наявність файла
  if ($_SESSION["logined"]) { //Провірка чи було здійснено вхід в систему
  $filename_raw = scandir("../../$_POST[folder]");
  $filename = count(array_slice($filename_raw,2));
  $size = getimagesize($_FILES["img"]["tmp_name"]);
  $width = $size[0];
  $height = $size[1];
  if($width >= 1920){
  $old_w = $width;
  $old_h = $height;
  while ($width >= 1920) {
    $width = round($width * 0.8);
    $height = round($height * 0.8);
  }
  $nimg = imagecreatetruecolor($width, $height);
  $source = imagecreatefromjpeg($_FILES["img"]["tmp_name"]);
  if(!imagecopyresized($nimg, $source, 0, 0, 0, 0, $width, $height, $old_w, $old_h)){
    echo ("_error_");
    return;
  }
  while(file_exists("../../$_POST[folder]/".$filename.".png")){
    $filename++;
  }
  if(!imagejpeg($nimg, "../../$_POST[folder]/".$filename.".png")){
    echo ("_error_");
    imagedestroy($nimg);
    return;
  } else{
   echo "_success_";
   imagedestroy($nimg);
   return;
 }
}
while(file_exists("../../$_POST[folder]/".$filename.".png")){
  $filename++;
}
  if(!move_uploaded_file($_FILES["img"]["tmp_name"],"../../$_POST[folder]/".$filename.".png")){ // зберігаємо файл
    echo ("_error_");
  } else echo "_success_";;
}
} ?>
