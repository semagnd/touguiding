<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$year = date("Y", strtotime("+8 HOURS"));
	require_once("class.php");
	$user=new User();
	$qjan = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '1' && `year` = '$year'") or die(mysqli_error());
	$fjan = $qjan->fetch_array();
	$qfeb = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '2' && `year` = '$year'") or die(mysqli_error());
	$ffeb = $qfeb->fetch_array();
	$qmar = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '3' && `year` = '$year'") or die(mysqli_error());
	$fmar = $qmar->fetch_array();
	$qapr = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '4' && `year` = '$year'") or die(mysqli_error());
	$fapr = $qapr->fetch_array();
	$qmay = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '5' && `year` = '$year'") or die(mysqli_error());
	$fmay = $qmay->fetch_array();
	$qjun = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '6' && `year` = '$year'") or die(mysqli_error());
	$fjun = $qjun->fetch_array();
	$qjul = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '7' && `year` = '$year'") or die(mysqli_error());
	$fjul = $qjul->fetch_array();
	$qaug = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '8' && `year` = '$year'") or die(mysqli_error());
	$faug = $qaug->fetch_array();
	$qsep = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '9' && `year` = '$year'") or die(mysqli_error());
	$fsep = $qsep->fetch_array();
	$qoct = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '10' && `year` = '$year'") or die(mysqli_error());
	$foct = $qoct->fetch_array();
	$qnov = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '11' && `year` = '$year'") or die(mysqli_error());
	$fnov = $qnov->fetch_array();
	$qdec = $user->runQuery("SELECT COUNT(*) as total FROM `booktour` WHERE `month` = '12' && `year` = '$year'") or die(mysqli_error());
	$fdec = $qdec->fetch_array();
	$year = date("Y");
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
		window.onload = function(){ 
			$(".chartContainer").CanvasJSChart({ 
				title: { 
					text: "Monthly booked tourist Population <?php echo $year?>" 
				}, 
				axisY: { 
					title: "Total Population", 
					includeZero: false 
				}, 
				data: [ 
				{ 
					type: "column", 
					toolTipContent: "{label}: {y}", 
					dataPoints: [ 
						{ label: "January", y: <?php echo $fjan['total']?> },
						{ label: "Febuary", y: <?php echo $ffeb['total']?> },
						{ label: "March", y: <?php echo $fmar['total']?> },
						{ label: "April", y: <?php echo $fapr['total']?> },
						{ label: "May", y: <?php echo $fmay['total']?> },
						{ label: "June", y: <?php echo $fjun['total']?> },
						{ label: "July", y: <?php echo $fjul['total']?> },
						{ label: "August", y: <?php echo $faug['total']?> },
						{ label: "September", y: <?php echo $fsep['total']?> },
						{ label: "October", y: <?php echo $foct['total']?> },
						{ label: "November", y: <?php echo $fnov['total']?> },
						{ label: "December", y: <?php echo $fdec['total']?> }
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
		<div id = "ta" class = "well"  >
			<div class="chartContainer" style="height: 300px; width: 1000px"></div>	
			
		</div>
		<button id = "s_target" class = "btn btn-success"><span class = "glyphicon glyphicon-eye-open"></span> Show Record</button>
		<button id = "h_target" style = "display:none;" class = "btn btn-danger"><span class = "glyphicon glyphicon-eye-close"></span> Hide Record</button>
		<br />
		<br />
		<div id = "target">
			<div class = "alert alert-info">booked tourist Record</div>
			<table id = "table" cellspacing = "0" class = "display">
				<thead>
					<tr>
						<th>Name</th>
						<th>email</th>
						<th>mobile number</th>
						<th>residential address</th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
				<?php 
					require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("SELECT * FROM `booktour` ORDER BY `id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
					<tr>
						<td><?php echo $fetch['name']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['mobileno']?></td>
						<td><?php echo $fetch['residentialaddresss']?></td>
						<td><center><a class = "btn btn-primary" href = "tourist_record.php?id=<?php echo $fetch['id']?>"><span class = "glyphicon glyphicon-search"></span> All Records</a></center></td>
					</tr>
				<?php
					}
				?>		
				</tbody>
			</table>
		</div>	
	</div>	
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Tour guiding System 2017</label>
	</div>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#target").hide();
			$("#s_target").click(function(){
				$("#target").fadeIn();
				$("#s_target").hide();
				$("#ta").slideUp();
				$("#h_target").show();
			});
			$("#h_target").click(function(){
				$("#target").fadeOut();
				$("#s_target").show();
				$("#h_target").hide();
				$("#ta").slideDown();
			});
		});
	</script>
</body> 
</html>