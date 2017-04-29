<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      exit();
}

$username = $_SESSION['username'];

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Settings</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>Schedule</span>It</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Settings</a></li>
							<li><a href="php/logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div>
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeBar()">&times;</a>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"> Dashboard</a></li>
			<li><a href="calender.php"> Calender</a></li>
			<li><a href="groups.php"> Groups</a></li>
			<li class="active"><a href="settings.html"> Settings</a></li>

			<li role="presentation" class="divider"></li>
		</ul>
	</div>

	<div id="Main" class="col-sm-9 col-sm col-lg-10 col-lg main">

		<div class="row">
			<div class="col-lg-12">
				<span style="font-size:20px;cursor:pointer" onclick="openBar()">&#9776; MENU</span>
				<h1 class="page-header">Settings</h1>
			</div>
		</div>


	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	function openBar() {
			document.getElementById("sidebar-collapse").style.width = "20%";
			document.getElementById("sidebar-collapse").style.display = "block";
	}

	function closeBar() {
	    document.getElementById("sidebar-collapse").style.width = "0%";
	}
</script>
</body>

</html>