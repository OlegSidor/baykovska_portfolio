<?php
if(isset($_POST)){
  $desc = scandir("../publication/description/");
  $files = array_slice($desc,2);
  $arr = array();
  for ($i=0; $i <sizeof($files); $i++) {
    $a = split("[.]",$files[$i]);
    $arr[$a[0]] = file_get_contents("../publication/description/".$files[$i]);
  }
    echo json_encode($arr);
}else {
  echo "Error. 404";
}
?>
