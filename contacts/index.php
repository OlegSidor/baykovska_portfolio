<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contacts</title>
    <link rel="icon" href="/images/ico.png" type="images/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/styles/styles.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="/styles/contacts.css?<?php echo time(); ?>">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
      @font-face{
        font-family:'TOONY_LOONS';
        src: url('/font/TOONY_LOONS.TTF');
        font-weight: normal;
        font-style: normal;
      }
    </style>
  </head>
  <body>
    <header>
      <div id="normalize">-</div>
      <div id="menu">
        <li> <a id="button" href="/">portfolio</a></li>
        <li> <a id="button" href="/sketchbook">sketchbook</a></li>
        <li> <a id="button" href="/publication">publication</a></li>
        <li> <a id="button" href="/contacts">contacts</a></li>
        <li> <a id="button" href="/about">about</a></li>
        </div>
        <button id="hide-show"><img src="/images/1231231.png" alt=""></button>
      <div class="logo">
        <a href="/"><img id="IRA" src="/images/logo.png"></a>
      </div>
      <ul class="navigationbar">
        <li> <a id="button" href="/">portfolio</a></li>
        <li> <a id="button" href="/sketchbook">sketchbook</a></li>
        <li> <a id="button" href="/publication">publication</a></li>
        <li> <a id="button" href="/contacts">contacts</a></li>
        <li> <a id="button" href="/about">about</a></li>
        <li class="social"><a href="https://www.instagram.com/irabaykovskart/"><img src="/images/instagram.png"></a><a href="https://www.facebook.com/baykovska/"><img src="/images/facebook.png"></a></li>
      </ul>
      <li class="social-mobile"><a href="https://www.instagram.com/irabaykovskart/"><img src="/images/instagram.png"></a><a href="https://www.facebook.com/baykovska/"><img src="/images/facebook.png"></a>
  </header>
    <main>
      <div class="content">
        <img src="/images/contact.jpg">
        <div class="contact-form">
          <div id="info">
          <span></span>
        </div>
          <input class="form-input" placeholder="Name" type="text" id="name">
          <input class="form-input" placeholder="E-mail" type="text" id="email">
          <input class="form-input" placeholder="Subject" type="text" id="Subject">
          <textarea class="form-input" placeholder="Message" id="Message" rows="10"></textarea>
          <div class="g-recaptcha" data-callback="submited" data-sitekey="6LdUqj0UAAAAAOxPa2_vz4k5WfUbikMzB9qVY8eC"></div>
          <button type="submit" disabled name="submit">Submit</button>
        </div>
      </div>
    </main>
    <footer>
    <div class="main-footer">
      <div class="copy-right">
        <span>&copy;Ira Baykovska. All rights reserved.</span>
      </div>
    </div>
    </footer>
    </script>
    <script src="/js/jquery-3.2.1.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/contacts.js?<?php echo time(); ?>"></script>
    <script type="text/javascript" src="/js/navmob.js?<?php echo time(); ?>"></script>
  </body>
</html>
