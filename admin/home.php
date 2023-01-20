<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	require_once("class.php");
	$user=new User();
	$stmt = $user->runQuery("SELECT * FROM nomessage where type='admin'") or die(mysqli_error());
	$row=$stmt->fetch_array();
	$qisrael = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'israel'") or die(mysqli_error());
	$fisrael = $qisrael->fetch_array();
	$qamerica = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'america'") or die(mysqli_error());
	$famerica = $qamerica->fetch_array();
	$qjapan = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'japan'") or die(mysqli_error());
	$fjapan = $qjapan->fetch_array();
	$qenglish = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'english'") or die(mysqli_error());
	$fenglish = $qenglish->fetch_array();
	$qrussia = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'russia'") or die(mysqli_error());
	$frussia = $qrussia->fetch_array();
	$qbrazil = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'brazil'") or die(mysqli_error());
	$fbrazil = $qbrazil->fetch_array();
	$qspain = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'spain'") or die(mysqli_error());
	$fspain = $qspain->fetch_array();
	$qsouthafrica = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'south africa'") or die(mysqli_error());
	$fsouthafrica = $qsouthafrica->fetch_array();
	$qkenya = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `country` = 'kenya'") or die(mysqli_error());
	$fkenya = $qkenya->fetch_array();
?>
<html lang = "eng">
	<head>
		<title>Tour guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Total Tourist Population of each country <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							{ label: "Israel",  y: 
								<?php 
									if($fisrael == ""){
											echo 0;
									}else{
										echo $fisrael['total'];
									}
								?>, legendText: "Israel"}, 
							{ label: "America",  y: 
								<?php 
									if($famerica == ""){
										echo 0;
									}else{
										echo $famerica['total'];
									}	
								?>, legendText: "America"},
							{ label: "Japan",  y: 
								<?php 
									if($fjapan == ""){
										echo 0;
									}else{
										echo $fjapan['total'];
									}	
								?>, legendText: "Japan"},
							{ label: "English",  y: 
								<?php 
									if($fenglish == ""){
										echo 0;
									}else{
									echo $fenglish['total'];
									}
								?>, legendText: "English"},
							{ label: "Russia",  y: 
								<?php 
									if($frussia == ""){
										echo 0;
									}else{
										echo $frussia['total'];
									}	
								?>, legendText: "Russia"},
							{ label: "Brazil",  y: 
								<?php
									if($fbrazil == ""){
										echo 0;
									}else{
										echo $fbrazil['total'];
									}	
								?>, legendText: "Brazil"},
							{ label: "Spain",  y: 
								<?php
									if($fspain == ""){
										echo 0;
									}else{
										echo $fspain['total'];
									}	
								?>, legendText: "Spain"},
							{ label: "South Africa",  y: 
								<?php 
									if($fsouthafrica == ""){
										echo 0;
									}else{
										echo $fsouthafrica['total'];
									}	
								?>, legendText: "South Africa"},
								{ label: "Kenya",  y: 
								<?php 
									if($fkenya == ""){
										echo 0;
									}else{
										echo $fkenya['total'];
									}	
								?>, legendText: "Kenya"}
						] 
					} 
					] 
				}); 
			} 
		</script>
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour guiding System - Ethiopia</label>
		<?php
				$q = $user->runQuery("SELECT * FROM `user` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
			   $f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
				<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;message(<?php echo $row['messagenum']; ?>) </a></li>
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
						echo $f['email'];
							//$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrator</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> User</a></li>
					</ul>
				</li>
				<li><li><a href = "tourist.php"><i class = "glyphicon glyphicon-user"></i> tourist</a></li></li>
				<li><li><a href = "hotel.php"><i class = "glyphicon glyphicon-book"></i> hotel</a></li></li>
				<li><li><a href = "guide.php"><i class = "glyphicon glyphicon-user"></i> guide</a></li></li>
				<li><li><a href = "place.php"><i class = "glyphicon glyphicon-book"></i> place</a></li></li>
				<li><li><a href = "dictionary.php"><i class = "glyphicon glyphicon-user"></i> dictionary</a></li></li>
				<li><li><a href = "package.php"><i class = "glyphicon glyphicon-user"></i> package</a></li></li>
				<li><li><a href = "addaattraction.php"><i class = "glyphicon glyphicon-user"></i> add attractions</a></li></li>
				
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Tour guiding System 2017</label>
	</div>
		
</body>
</html>