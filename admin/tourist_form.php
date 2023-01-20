<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	require_once("class.php");
	$user=new user();
?>
<html lang = "eng">
	<head>
		<title>tour guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">tour guiding System - Ethiopia</label>
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
		<?php 
			$q = $user->runQuery("SELECT * FROM `booktour`  WHERE `id` = '$_GET[id]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			
		<div class = "alert alert-info">Basic Information <a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "tourist_record.php?itr_no=<?php echo $_GET['id']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['name']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">email</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['email']?></label>
				</div>
				<div style = "float:left; width:15%;">
					<label style = "font-size:18px;">mobile number</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['mobileno']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">residential address</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['residentialaddresss']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">country</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['country']?></label>					
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date of booked: </label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['bookdate']))?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">source:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['source']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">destination:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['destination']?></label>
				</div>
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>date of starting and end date</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">depurture:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['depurture']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">back date:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['backdate']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>fare</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">room fare:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['room_fare']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">package fare:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pfare']?></label>		
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">tourist way fare:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['tfare']?></label>		
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">total fare:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['totalfare']?></label>		
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>tourist is choice the following guide ,hotel and package </b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">guide name:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gname']?></label>
					
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">hotel name:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['hname']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">package name:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pname']?></label>
				</div>
				<br />
				<br />
				
	<br />
	<br />
	<br />
	<br />
	<br />
	</div>	
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
	<?php 
		require'script3.php';	
	?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
	</script>
</body> 
</html>