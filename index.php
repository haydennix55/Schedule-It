<?php
  ob_start();
  session_start();
  include_once '/include/connectDB.php';
?>

<!DOCTYPE html>
<html>
<head>

<!-- your webpage info goes here -->

    <title>Schedule-It</title>

	<meta name="author" content="your name" />
	<meta name="description" content="" />

<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->
	<link rel="stylesheet" href="homepage/homepage.css" type="text/css" />

</head>
<body>

<!-- webpage content goes here in the body -->

	<div id="page">
		<div id="logo">
			<h1><img class="logo-header" src="homepage/logo.jpeg" alt="Logo"></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="login-page/index.html">Sign In</a></li>
				<li><a href="registration-page/registration-page.php">Sign Up</a></li>
				<li><a href="#/contact.html">Contact</a></li>
			</ul>
		</div>
		<div id="content">
			<h2>Welcome!</h2>
			<p>
				Schedule It is a new scheduling application that is here to make scheduling meeting times between you and your colleagues or friends a breeze!
			</p>
		</div>
		<div id="footer">
			<p>
				Brought to you by <a href="/" target="_blank">[Schedule It]</a>
			</p>
		</div>
	</div>
</body>
</html>
