<?php
date_default_timezone_set('UTC');
$login_def = "demirajka";
$password_def = "2721e8d4df3162c474a0b1c867705eae";
$sign = "jjahhs23hhsjasdks";
$secret = "skksuwusuua77s78Aa";
if($_COOKIE["autologin"] != md5($secret.md5(date('l jS \of F Y')))){
if(isset($_POST)){
  $login = $_POST["login"];
  $password = $_POST["password"];
  if($login == $login_def && md5($password) == $password_def){
    SetCookie("autologin",md5($secret.md5(date('l jS \of F Y'))),time()+3600);
} else {
  header('Location: /admin/loginform.html');
  exit();
}
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Адмін панель</title>
    <link rel="stylesheet" href="/admin/styles/main.css?<?=time()?>">
  </head>
  <body>
    <div class="buttons">
    <button id="new_img">Додати</button>
    <button id="del_img">Видалити</button>
    <button id="move_img">Перемістити</button>
    <button id="description">Описання (publication)</button>
  </div>
  <div class="functions">
    <form class="new_img" action="/admin/php/addimg.php" method="post" enctype="multipart/form-data">
      <select required name="folder">
        <option value="portfolio">portfolio</option>
        <option value="sketchbook">sketchbook</option>
        <option value="publication">publication</option>
      </select>
      <input autocomplete='secret-code' type="hidden" name="secret" value="<?=md5($sign)?>">
      <input required multiple type="file" name="files[]">
      <button type="submit" name="submit">OK</button>
    </form>
    <form class="del_img" action="/admin/php/delimg.php" method="post">
      <select funk="dell" name="folder" class="folder">
        <option value="portfolio">portfolio</option>
        <option value="sketchbook">sketchbook</option>
        <option value="publication">publication</option>
      </select>
      <input autocomplete='secret-code' type="hidden" name="secret" value="<?=md5($sign)?>">
      <input class="del_list" type="text" name="list" value="" style="display:none">
      <?php
      $mysqli = new mysqli("***","***","*","***");
      $mysqli -> query("SET NAME 'utf8'");
      $items = $mysqli -> query("SELECT `src` FROM `portfolio`");
      echo "<div class='dell portfolio'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time' onClick='select(this)'>";
      }
      echo "</div>";
      $items = $mysqli -> query("SELECT `src` FROM `sketchbook`");
              echo "<div class='dell sketchbook'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time' onClick='select(this)'>";
      }
              echo "</div>";
      $items = $mysqli -> query("SELECT `src` FROM `publication`");
      echo "<div class='dell publication'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time' onClick='select(this)'>";
      }
      echo "</div>";
      ?>
      <button id="del" type="submit" name="submit">OK</button>
    </form>
    <form class="move_img" action="/admin/php/moveimg.php" method="post">
      <select funk="move" name="folder" class="folder">
        <option value="portfolio">portfolio</option>
        <option value="sketchbook">sketchbook</option>
        <option value="publication">publication</option>
      </select>
      <input autocomplete='secret-code' type="hidden" name="secret" value="<?=md5($sign)?>">
      <input class="move_list" type="text" name="list" value="" style="display:none">
      <?php
      $mysqli = new mysqli("***","***","*","***");
      $mysqli -> query("SET NAME 'utf8'");
      $items = $mysqli -> query("SELECT `src` FROM `portfolio`");
      $count = $items ->num_rows;
      echo "<div class='move portfolio'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time'>";
      }
      echo "</div>";
      $items = $mysqli -> query("SELECT `src` FROM `sketchbook`");
              echo "<div class='move sketchbook'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time'>";
      }
              echo "</div>";
      $items = $mysqli -> query("SELECT `src` FROM `publication`");
      echo "<div class='move publication'>";
      while (($item = $items ->fetch_assoc()) != false) {
        $time = time();
        echo "<img src='$item[src]?$time'>";
      }
      echo "</div>";
      ?>
      <button id="move" type="submit" name="submit">OK</button>
    </form>
    <form class="description" action="/admin/php/description.php" method="post">
      <input autocomplete='secret-code' type="hidden" name="secret" value="<?=md5($sign)?>">
      <?php
      $mysqli = new mysqli("***","***","*","***");
      $mysqli -> query("SET NAME 'utf8'");
      $items = $mysqli -> query("SELECT * FROM `publication`");
       while (($item = $items -> fetch_assoc()) != false) {
         echo "<img src='$item[src]'>";
        echo "<input autocomplete='src' type='hidden' name='srcs[]' value='$item[src]'>";
        echo "<textarea rows='8' cols='40' name='desc[]'>$item[desctiption]</textarea>";
      }
       ?>
       <button type="submit" name="submit">OK</button>
    </form>
  </div>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="/admin/js/main.js?<?=time()?>"></script>
  <script type="text/javascript" src="/admin/js/del.js?<?=time()?>"></script>
  <script type="text/javascript" src="/admin/js/move.js?<?=time()?>"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>
