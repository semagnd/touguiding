<!DOCTYPE html>
<?php
	 require_once 'logincheck.php';
	//session_start();
	require_once('class.php');
	$user=new user();
	$stmt = $user->runQuery("SELECT * FROM nomessage where type='admin'") or die(mysqli_error());
	$row=$stmt->fetch_array();
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
		<?php
			$q1 = $user->runQuery("SELECT * FROM `booktour` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
			$f1 = $q1->fetch_array();
		?>
		<div class = "alert alert-info">tourist Record / <?php echo $f1['name']?><a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "tourist.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Date booked</th>
					<th>source</th>
					<th>destination</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$q = $user->runQuery("SELECT * FROM `booktour`  WHERE `id` = '$_GET[id]' ORDER BY `bookdate` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo date("m/d/Y", strtotime($f['bookdate']))?></td>
					<td><?php echo $f['source']?></td>
					<td><?php echo $f['destination']?></td>
					<td><center><a href = "tourist_form.php?id=<?php echo $f['id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-search"></span> View Detail</a><center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>	
	</div>	
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Tour guiding System 2017</label>
	</div>
	<?php 
		require'script3.php';	
	?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false,
					"order": "DESC"
				});
			});
	</script>
</body> 
</html>