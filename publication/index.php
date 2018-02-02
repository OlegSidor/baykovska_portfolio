<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
	<title>Ira Baykovska / Illustrator</title>
	<link rel="icon" href="/images/ico.png" type="images/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/styles/bootstrap.css">
	<link rel="stylesheet" href="/styles/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="/styles/styles.css?<?php echo time(); ?>">
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
	<div class="gallery-bg">
		</div>
	<div class="gallery">
		<div class="images">
		</div>
		<div class="desc"></div>
			<div class="navbuttns">
		<div  class="next" onclick="nextimg()"><button name="next"><img src="/images/next.png" height="50px" alt="next" /></button></div>
		<div class="back" onclick="previmg()"><button name="back" type="submit"><img src="/images/back.png" height="50px" alt="bacl" /></button></div> <br>
			</div>
				</div>
 </div>
	<!--HEADER Block: Begin-->
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
	<!--HEADER Block: End-->


	<!--MAIN Container: Beginn-->
	<main class="page-content">
		<div class="load">
			<a>
				<img class="loadimg" src="/images/load.gif">
			</a>
		</div>
		<div class="cnt">
			<div id="content">
	  		</div>
		</div>
	</main>
	<!--MAIN Container: End-->

	<!--FOOTER:Start-->
	<footer>
	<div class="main-footer">
		<div class="copy-right">
			<span>&copy;Ira Baykovska. All rights reserved.</span>
		</div>
	</div>
	</footer>
	<!--FOOTER:End-->
	<script type="text/javascript">
	sessionStorage['page'] = "/publication/img";
	</script>
<script src="/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/js/loadimg.js?<?php echo time(); ?>"></script>
<script src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/navmob.js?<?php echo time(); ?>"></script>
<script type="text/javascript" src="/js/publication.js?<?php echo time(); ?>"></script>
</body>
</html>
