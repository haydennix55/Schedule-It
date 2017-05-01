<?php
session_start();
include_once '/php/functions.php';
include_once '/include/connectDB.php';

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header("Location:/login-page/index.php");
}



$username = $_SESSION['username'];
$first_name = $_SESSION['first'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Members</title>

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
			<li class="active"><a href="groups2.php"> Groups</a></li>
			<div class="dropdown">
			    <button class="dropbtn">Settings</button>
			    <div class="dropdown-content">
			      <a href="php/logout.php">Sign Out</a>
			      <a href="#">Change Email</a>
			      <a href="#">Change Password</a>
			    </div>
			  </div>

			<li role="presentation" class="divider"></li>
		</ul>
	</div>

	<div id="Main" class="col-sm-9 col-sm col-lg-10 col-lg main">
    <div class="container">
			<div class="col-lg-12">
				<span style="font-size:20px;cursor:pointer" onclick="openBar()">&#9776; MENU</span>
				<h1 class="page-header">Members</h1>
		        <?php
              $mem_query = mysql_query("SELECT uid FROM users");
              while($run_mem = mysql_fetch_array($mem_query)){
              $user_id = $run_mem['uid'];
              $uName = getUser($user_id, 'username');
              echo $uName;
            }
          ?>

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
