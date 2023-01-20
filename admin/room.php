<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>Tour Guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
				<style type="text/css">
	input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#843534;
    box-shadow: none;
}


input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#843534;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}


.parsley-errors-list {
    list-style-type: none;
    opacity: 0;
    transition: all .3s ease-in;

    color: #d16e6c;
    margin-top: 5px;
    margin-bottom: 0;
  padding-left: 0;
}

.parsley-errors-list.filled {
    opacity: 1;
    color: #a94442;
}
	</style>
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour Guiding System System - Ethiopia</label>
			<?php
			/*	$conn = new mysqli("localhost", "root", "", "dblogin") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
				$f = $q->fetch_array();*/
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							//echo $f['firstname']." ".$f['lastname'];
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
				<li><li><a href = "hotel.php"><i class = "glyphicon glyphicon-user"></i> hotel</a></li></li>
				<li><li><a href = "guide.php"><i class = "glyphicon glyphicon-user"></i> guide</a></li></li>
				<li><li><a href = "place.php"><i class = "glyphicon glyphicon-user"></i> place</a></li></li>
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
		<div class = "panel panel-success">	
		<?php
			require_once('class.php');
                          $user = new user();
			$query = $user->runQuery("SELECT * FROM `hotel` WHERE `hotel_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>detail about  room:</label>
				<a href = "hotel.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:100%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
					<div class = "form-group">	
							<input type="hidden" name="totalvip" value="<?php echo $fetch['numvip']; ?>" />
						</div>
						<div class = "form-group">	
							<input type="hidden" name="total1st" value="<?php echo $fetch['num1st']; ?>" />
						</div>
						<div class = "form-group">	
							<input type="hidden" name="totalnor" value="<?php echo $fetch['numnormal']; ?>" />
						</div>
						<div class="form-group">
			</div>
						<?php
						for($i=1; $i<=$fetch['numvip']; $i++) 
 {
  ?>
						<div class = "form-inline">
						<div style = "float:left; width:100%;">
							
							<input type="text"style = "float:left; width:20%;"class="form-control"name="cost<?php echo $i; ?>" placeholder="enter vip room cost" required />
							
							
							<input  type="text"style = "float:left; width:20%;"class="form-control"name="rnumber<?php echo $i; ?>" placeholder="enter vip room number" required />
							
							
							
							<input type="text"style = "float:left; width:20%;"class="form-control" name="about<?php echo $i; ?>" placeholder="enter about vip room"required />
							</div>
						</div>
						<?php
 }
						for($i=1; $i<=$fetch['num1st']; $i++) 
 {
  ?>
						<div class = "form-inline">
						<div style = "float:left; width:100%;">
							
							<input type="text"style = "float:left; width:20%;"class="form-control" name="cost1<?php echo $i; ?>" placeholder="enter vip room cost" required />
							
							
							<input type="text"style = "float:left; width:20%;"class="form-control"name="rnumber1<?php echo $i; ?>" placeholder="enter vip room number" required />
							
							
							<input type="text"style = "float:left; width:20%;" class="form-control"name="about1<?php echo $i; ?>" placeholder="enter about vip room"required />
						</div>
						</div>
						<?php
 }
						for($i=1; $i<=$fetch['numnormal']; $i++) 
 {
  ?>
						<div class = "form-inline">
						<div style = "float:left; width:100%;">
							
							<input type="text"style = "float:left; width:20%;"class="form-control" name="costnor<?php echo $i; ?>" placeholder="enter vip room cost" required />
							
							
							<input type="text"style = "float:left; width:20%;"class="form-control"name="rnumber2<?php echo $i; ?>" placeholder="enter vip room number" required />
							
							
							<input type="text"style = "float:left; width:20%;"class="form-control" name="aboutnor<?php echo $i; ?>" placeholder="enter about vip room"required />
						</div>
						</div>
						<?php
 }
 ?>
							<button  class = "btn btn-warning" name = "submit" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
							<?php
							if(ISSET($_POST['submit']))
							{
							 $totalvip = $_POST['totalvip'];
							$total1st = $_POST['total1st'];
							$totalnor = $_POST['totalnor'];
							 $type="vip";
							  $type1="1st level";
							   $type2="normal";
							 $hname=$fetch['hname'];
							 $status="notreserve";

                        for($i=1; $i<=$totalvip; $i++)
                          {
                       	$cost = $_POST["cost$i"];
	                    $about = $_POST["about$i"];
						$rnum=$_POST["rnumber$i"];
		
						$query = $user->runQuery("insert into rooms(hname,type,status,cost,about,room_number) values('$hname','$type','$status','$cost','$about','$rnum')") or die(mysqli_error());	
						$add="add";
                          $user->runQuery("update hotel set addroom='add' where hname='$hname'") or die(mysqli_error());
$error[]='success';						  
		                 }
						 for($i=1; $i<=$total1st; $i++)
                          {
                       	$cost = $_POST["cost1$i"];
	                    $about = $_POST["about1$i"];
						$rnum=$_POST["rnumber1$i"];
		
						$query = $user->runQuery("insert into rooms(hname,type,status,cost,about,room_number) values('$hname','$type1','$status','$cost','$about',$rnum)") or die(mysqli_error());	
						$add="add";
                          $user->runQuery("update hotel set addroom='add' where hname='$hname'") or die(mysqli_error());	
$error[]='success';						  
		                 }
						 for($i=1; $i<=$totalnor; $i++)
                          {
                       	$cost = $_POST["costnor$i"];
	                    $about = $_POST["aboutnor$i"];
						$rnum=$_POST["rnumber1$i"];
		
						$query = $user->runQuery("insert into rooms(hname,type,status,cost,about,room_number) values('$hname','$type2','$status','$cost','$about','$rnum')") or die(mysqli_error());
						$add="add";
                          $user->runQuery("update hotel set addroom='add' where hname='$hname'") or die(mysqli_error());
                 $error[]='success';						  
		                 }
						 ?>
			<script>
		window.location='hotel.php';
			</script>
			<?php
						 
							}
							
							?>	
							<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <script> window.location('hotel.php'); </script>
                     <?php
				}
			}
			else if(isset($_GET['inserted']))
			{
				 ?>
                 <div class="alert alert-info">
				 <button class='close' data-dismiss='alert'>&times;</button>
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered </a> here
                 </div>
                 <?php
			}
			?>
					</div>
									
					</div>
				</form>
			</div>	
			
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Tour guiding System 2017</label>
	</div>
<?php require'script.php' ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
<script src="parsleyjs/dist/parsley.min.js"></script>
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>
</body>
</html>