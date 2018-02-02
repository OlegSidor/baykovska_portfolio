<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Адмін панель</title>
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="js/main.js?<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/bootstrap-theme.css">
    <link rel="stylesheet" href="css/styles.css?<?php echo time(); ?>">
  </head>
  <body>
    <div class="loginform">
    <input class="form-control" type="text" id="login" placeholder="логін"/><br>
    <input class="form-control" type="password" id="pass" placeholder="Пароль"/><br>
    <button class="form-control btn btn-success" onclick="login()" id="submit">Увійти</button><br>
    <label id="stay_label"><input  id="stay" type="checkbox"/>Залишатися в системі.</label>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>
