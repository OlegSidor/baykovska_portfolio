<?php
if (isset($_POST)) {
$to = "irabaykovska@gmail.com";
$message = "name: $_POST[name] \n message: \n".$_POST["message"]."\n from: $_POST[email]";
if (mail($to,$_POST["subject"],$message)) {
echo "__OK__";
} else echo "__ERROR__";
} else {
  echo "Error. 404";
}
?>
