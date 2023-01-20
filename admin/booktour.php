<?php
require_once 'logincheck.php';
require_once('class.php');
$user = new User();
$stm=$user->runQuery("select * from booktour") or die(mysqli_error());
while($row=$stm->fetch_array())
{
$status=$row['backdate'];
$name=$row['name'];
$gname=$row['gname'];
$hname=$row['hname'];
$roomtype=$row['room_type'];
$roomnumber=$row['room_number'];
$date=date("Y-m-d");
$num=strtotime($date);
$backdate1=strtotime($status);
if($backdate1<$num)
{

$stmt=$user->runQuery("update rooms set status='notreserve' where hname='$hname' AND type='$roomtype' AND room_number='$roomnumber'") or die(mysqli_error());
$stmt=$user->runQuery("update guide set status='notreserve' where gname='$gname'") or die(mysqli_error());
}
}
              $name="";
                $ts="";
	            $tdd="";
				$email="";
				$phone="";
				$address="";
				$country="";
				$bd="";
				$bf="";
				$bdu="";
				$td="";
				$tf="";
				$tdu="";
				$fd="";
				$ff="";
				$fdu="";
				$vp="";
				//$address="";
				$backdate="";
				$depart="";
if(isset($_POST['check1']))
    {
				$name=$_POST["name"];
				$ts=$_POST["source"];
	            $tdd=$_POST["destination"];
				$email=$_POST["email"];
				$phone=$_POST["phone"];
				$address=$_POST['address'];
				$country=$_POST['country'];
				$backdate=$_POST['backdate'];
				$depart=$_POST['depart'];
$stmt = $user->runQuery( "SELECT * FROM `place` where `source`='$ts' AND destination='$tdd'") or die(mysqli_error());
$row=$stmt->fetch_array();
if(($row['source']!==$ts)&&($row['destination']!==$tdd))
{
        $message="please tell me the cost from  ".$ts." to " .$tdd;
		$section="place";
		$person="admin";
		$user->send($name,$message,$section,$person);
		
		 $error[]="you send request to get information about the tour please try again later";
		 $type="admin";
		 $user->totalmessage($type);
		 //$user->redirect('home.php?request');
		
		}
else
	{
           $bd=$row['bdistance']; 
		   $bf=$row['bfare']; 
		   $bdu=$row['bduration']; 
		   $td=$row['tdistance']; 
		   $tf=$row['tfare']; 
		   $tdu=$row['tduration']; 
		   $fd=$row['fdistance']; 
		   $ff=$row['ffare']; 
		   $fdu=$row['fduration']; 
		   $vp=$row['vistingplace']; 
        } 
	}	
		$twf="";
		$cost="";
		$type="";
		$room_number="";
		$pf="";
		$hn="";
		$gn="";
		$pn="";
		$ttf="";
		if(isset($_POST['check2']))
		{
		$twf=$_POST['tway'];
		$cost=$_POST['rcost'];
		$pf=$_POST['pfare'];
		$type=$_POST["roomtype"];
		$room_number=$_POST["roomnumber"];
		$hn=$_POST["hotel"];
		$gn=$_POST["guide"];
		$pn=$_POST["package"];
		       $name=$_POST["name"];
				$ts=$_POST["source"];
	            $tdd=$_POST["destination"];
				$email=$_POST["email"];
				$phone=$_POST["phone"];
				$address=$_POST['address'];
				$country=$_POST['country'];
				$depart=$_POST['depart'];
				$backdate=$_POST['backdate'];
				$diff = abs(strtotime($backdate) - strtotime($depart));
				$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
     $idb=$twf+$cost+$pf;
		$ttf=$days*$idb;
		$stmt = $user->runQuery( "SELECT * FROM `place` where `source`='$ts' AND destination='$tdd'") or die(mysqli_error());
while ($row= $stmt->fetch_array()){
           $bd=$row['bdistance']; 
		   $bf=$row['bfare']; 
		   $bdu=$row['bduration']; 
		   $td=$row['tdistance']; 
		   $tf=$row['tfare']; 
		   $tdu=$row['tduration']; 
		   $fd=$row['fdistance']; 
		   $ff=$row['ffare']; 
		   $fdu=$row['fduration']; 
		   $vp=$row['vistingplace']; 
        } 
		   }
	if(isset($_POST['ctour']))
		{
		$name=$_POST["name"];
				$ts=$_POST["source"];
	            $tdd=$_POST["destination"];
				$email=$_POST["email"];
				$phone=$_POST["phone"];
				$address=$_POST['address'];
				$country=$_POST['country'];
				$depart=$_POST['depart'];
				$backdate=$_POST['backdate'];
				$twn="bus";
				$twf=$_POST['tway'];
		$pf=$_POST['pfare'];
		$diff = abs(strtotime($backdate) - strtotime($depart));
				$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
     $idb=$twf+$cost+$pf;
		$ttf=$days*$idb;
		$hn=$_POST["hotel"];
		$gn=$_POST["guide"];
		$pn=$_POST["package"];
		$type=$_POST["roomtype"];
		$room_number=$_POST["roomnumber"];
		$cost=$_POST["rcost"];
		$ttr=$_POST['totalfare'];
		$status='notenter';
		$date=date("y-m-d", strtotime("+8 HOURS"));
$date=new DateTime($date);
$month=$date->format("m");
$day=$date->format("d");
$year = date("Y", strtotime("+8 HOURS"));
		     $user = new user();
			$query = $user->runQuery("SELECT * FROM `booktour` Where  email='$email'") or die(mysqli_error());
				$row = $query->fetch_array();
				if(var_dump($depart>$backdate))
				{
					$error[] = "sorry you !";
				}
				
		 else if($row['email']==$email) {
				$error[] = "sorry you are already booked !";
			}
			else
			{
	  $stmt=$user->booktour($name,$email,$phone,$address,$country,$ts,$tdd,$depart,$backdate,$twn,$twf,$cost,$pf,$ttr,$gn,$hn,$pn,$month,$year,$type,$room_number,$status);
	   $rstatus="reserve";
		$user->runQuery("update rooms set status='$rstatus' WHERE hname='$hn' AND type='$type' AND room_number='$room_number'") or die(mysqli_error());
		 $person=$gn;
		 $message="hellow ".$gn." you will be reserved from ".$depart."  to ".$backdate." you must be ready your self to guide tourist ".$name;
		 $section="guidemessage";
		 $user->send($name,$message,$section,$person);
		 $gstatus="reserve";
	  $user->runQuery("update guide set status='$gstatus' WHERE gname='$gn'") or die(mysqli_error());
		  $type=$gn;
		 $user->totalmessage($type);
		 $user->redirect('booktour.php?inserted');
       	
		   }}
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
		<link href="../css/bootstrap-datepicker.min.css" rel="stylesheet">
		 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		 <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
		 <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
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
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour Guiding System - Ethiopia</label>
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
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
					<a onclick="confirmationDelete(this);return false;" href = "canceltour.php?id=<?php echo $_SESSION['email'];?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "#"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				 <li><li><a href = "viewguide.php"><i class = "glyphicon glyphicon-eye-open"></i> view guide</a></li></li>
				<li><li><a href = "viewhotel.php"><i class = "glyphicon glyphicon-star"></i>view hotel availability</a></li></li>
				<li><li><a href = "viewpackage.php"><i class = "glyphicon glyphicon-eye-open"></i>view package</a></li></li>
				<li><li><a href = "viewdictionary.php"><i class = "glyphicon glyphicon-eye-open"></i>view dictionary</a></li></li>
				<li><li><a href = "booktour.php"><i class = "glyphicon glyphicon-book"></i>book tour</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> map</a>
					<ul>
						<li><a href = "viewlocationpath.php"><i class = "glyphicon glyphicon-cog"></i> direction view</a></li>
						<li><a href = "map.php"><i class = "glyphicon glyphicon-cog"></i> view your location</a></li>
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
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> &nbsp; <?php echo $error; ?>
			  </div>
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
			<div class = "panel-heading">
				<label>Book Tour</label>
				<a href = "tourist_profile.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:100%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						 <fieldset>
						<?php 
						$query = $user->runQuery("SELECT * FROM `account` Where  email='$_SESSION[email]'") or die(mysqli_error());
						$row = $query->fetch_array();
						$stmt = $user->runQuery("SELECT * FROM `booktour` Where  email='$_SESSION[email]'") or die(mysqli_error());
						$count=$stmt->num_rows;
						if($count==1)
						{
							$f=$stmt->fetch_array();
							$status=$f['status'];
							$enterdate=$f['depurture'];
							if($status=='notenter')
							{
								?>
								
											<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['name']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">email</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['email']?></label>
				</div>
				<div style = "float:left; width:20%;">
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
				<div style = "float:left; width:30%;">
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
				<h4 style = "color:#3C763D;"><b>you choice the following guide ,hotel and package </b></h4>
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
				<?php
				$date=date("Y-m-d");
				//$enter=strtotime($enterdate);
				//$date1=strtotime($date);
				if($date==$enterdate)
				{
				?>
				<div class="form-group">
            	<button type="submit" class="btn btn-primary" name = "confirm">
                	<i class="glyphicon glyphicon-save"></i>&nbsp;PLEASE CONFIRM YOU ENTERED
                </button>	
					</div>
			<?PHP
				}
			if(isset($_POST['confirm']))
			{
				$stmt=$user->runQuery("update booktour set status ='enter'") or die(mysqli_error());
				
			}
			?>
							<br />
					</div>
				<?php
							}
						
				else if($status=='enter')
				{
					
					?>
						<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['name']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">email</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['email']?></label>
				</div>
				<div style = "float:left; width:20%;">
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
				<div style = "float:left; width:30%;">
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
				<h4 style = "color:#3C763D;"><b>you choice the following guide ,hotel and package </b></h4>
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
				<?php
						}}
				else
				{
				?>
            <div class="form-group">
			<label for="name">Name :</label>
            <input type="text" class="form-control" name="name" placeholder="enter name "required data-parsley-pattern="^[a-zA-Z ]+$"value="<?php echo $row['name'];?>"/>
            </div>
            <div class="form-group">
			<label for="email">Email Address:</label>
            <input type="email" class="form-control" name="email" placeholder="enter Email address"required data-parsley-type="email" data-parsley-trigger="keyup"value="<?php echo $row['email'];?>"/>
            </div>
            <div class="form-group">
			<label for="phone">mobile no:</label>
            <input type="text" class="form-control" name="phone" placeholder="enter mobile number" required data-parsley-type="number"value="<?php echo $row['phoneno'];?>" />
            </div>
            <div class="form-group">
			<label for="address">residential address:</label>
            	<input type="text" class="form-control" name="address" placeholder="Enter residential address"required data-parsley-pattern="^[a-zA-Z ]+$"value="<?php echo $row['residentialaddress'];?>"/>
            </div>
			<div class="form-group">
			<label for="country">country:</label>
            	<input type="text" class="form-control" name="country" placeholder="Enter your country"required data-parsley-pattern="^[a-zA-Z ]+$"value="<?php echo $row['country'];?>"/>
            </div>
            <div class="form-group">
			<label for="source">source:</label>
            	<input type="text" class="form-control" name="source"required data-parsley-pattern="^[a-zA-Z ]+$"value="<?php echo $ts;?>"/>
            </div>
            <div class="form-group">
			<label for="destination">Destination:</label>
            	<input type="text" class="form-control" name="destination"required data-parsley-pattern="^[a-zA-Z ]+$" value="<?php echo $tdd;?>"/>
				</div>
				<div class="form-group">
			     <label for="backdate">backdate:</label>
            <input type="Date" class="datepick form-control" name="backdate"value="<?php echo $backdate;?>"required data-parsley-type="date" data-parsley-trigger="keyup">
				</div>
				<div class="form-group">
			     <label for="depart">departure:</label>
            <input type="Date" class="datepick form-control" name="depart"value="<?php echo $depart;?>"required data-parsley-type="date" data-parsley-trigger="keyup">
				</div>
				<div class="form-group">
            	<button type="submit" class="btn btn-primary" name="check1">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;check1
                </button>
				</div>
			</fieldset>
             <fieldset>
			<div class = "form-inline">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "bdistance">bus:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "tdistance">train:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "fdistance">flight:</label>
					</div>
					<div class = "form-inline">
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for = "distance">distance in km:</label>
						&nbsp;&nbsp;&nbsp;<input style="width:25%;" class = "form-control" disabled="disabled"name = "bdistance" type = "text" value="<?php echo $bd; ?>">
						<input style="width:25%;"class = "form-control" disabled="disabled"name = "tdistance" type = "text"value="<?php echo $td; ?>">
						<input style="width:25%;"class = "form-control" disabled="disabled"name = "fdistance" type = "text" value="<?php echo $fd; ?>">
					</div>
					<div class = "form-inline">
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for = "fare">travel fare in birr:</label>
						<input style="width:25%;" class = "form-control"disabled="disabled" name = "bfare" type = "text" value="<?php echo $bf; ?>">
						<input style="width:25%;"class = "form-control"disabled="disabled" name = "tfare" type = "text"value=" <?php echo $tf; ?>">
						<input style="width:25%;"class = "form-control"disabled="disabled" name = "ffare" type = "text" value="<?php echo $ff; ?>">
					</div>
					<div class = "form-inline">
					&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for = "duration">travel timing:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:25%;"class = "form-control"disabled="disabled" name = "bduration" type = "text" value="<?php echo $bdu; ?>">
						
						<input style="width:25%;"class = "form-control" disabled="disabled"name = "tduration"  type = "text"value="<?php echo $tdu; ?>">
						
						<input style="width:25%;"class = "form-control" disabled="disabled"name = "fduration" type = "text" value="<?php echo $fdu; ?>">
					</div>
						<fieldset style="width:100%;
	border:none;
	border-radius:5%;
	padding:1em;
	margin:0 1em;">
			<div class="form-group">
					
			<label for="vplace">visiting place:</label>
            	<textarea name='vplace' class='form-control'disabled="disabled"><?php echo $vp; ?></textarea>
            </div>
			<div class="form-group">
			<label for="tway">choice tourist way :</label>
            	<select class='form-control' name='tway'>
				<option value="<?php echo $bf; ?>">Bus</option>
				<option value="<?php echo $tf; ?>">train</option>
				<option value="<?php echo $ff; ?>">airline</option>
				</select>
				
            </div>
			
			<script src="jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{	
	// code to get all records from table via select box
	$("#gethotel").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
		$.ajax
		({
			url: 'roomtype.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#display").html(r);
			} 
		});
	})
	// code to get all records from table via select box
});
</script>

			<div class="form-group">
			<label for="hotel">Hotel name:</label>
            	<?php
    $stmt = $user->runQuery( "SELECT `hname` FROM `hotel` WHERE status='notreserve' ORDER BY `hname`");
			
 
    // put them in a select drop-down
    echo "<select class='form-control' name='hotel'id='gethotel'>";
        echo "<option value='{$hn}' selected='selected'>$hn</option>";
 
        while ($row = $stmt->fetch_array()){
            extract($row);
            echo "<option value='{$hname}'>{$hname}</option>";
        }
 
    echo "</select>";
    ?>
            </div>
			
			<div class="" id="display">
			<label for="roomtype">choice room type :</label>
            	 <select class='form-control' name='roomtype' id="getroomtype">
	  <option value='<?php echo $type; ?>' selected='selected'><?php echo $type; ?></option>";
	  <option name="pfare"value="<?php echo $type; ?>"><?php echo $type; ?></option>
				</select>
				
            </div>
			<div class="" id="display1">
			<label for="roomnum">room number:</label>
      <select class='form-control' name='roomnumber' id="getroomnum">
	  <option value='<?php echo $room_number; ?>' selected='selected'><?php echo $room_number; ?></option>";
	  <option value="<?php echo $room_number; ?>"><?php echo $room_number; ?></option>
	  </select>
    </div>
	<div class="" id="displaycost">
			<label for="rcost">room fare in birr:</label>
				<input type="text" class="form-control" name="rcost"value="<?php echo $cost; ?>"/><br />
       <!-- Records will be displayed here -->
    </div>
	
			<div class="form-group">
			<label for="hfare">guide name:</label>
            		<?php
    $stmt = $user->runQuery( "SELECT `gname` FROM `guide` where status='notreserve' ORDER BY `gname`") or die(mysqli_error());
 
    // put them in a select drop-down
    echo "<select class='form-control' name='guide'>";
        echo "<option value='{$gn}'>$gn</option>";
 
        while ($row_category = $stmt->fetch_array()){
            extract($row_category);
            echo "<option value='{$gname}'>{$gname}</option>";
        }
 
    echo "</select>";
    ?>
            </div>
			<script type="text/javascript">
$(document).ready(function()
{	
	// code to get all records from table via select box
	$("#getpackage").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
		$.ajax
		({
			url: 'pfare.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#pfdisplay").html(r);
			} 
		});
	})
	// code to get all records from table via select box
});
</script>
			<div class="form-group">
			<label for="hfare">package name:</label>
            		<?php
    $stmt = $user->runQuery( "SELECT `packagename` FROM `package` ORDER BY `packagename`")or die(mysqli_error());;
    // put them in a select drop-down
    echo "<select class='form-control' name='package'id='getpackage'>";
        echo "<option value='{$pn}' selected='selected'>$pn</option>";
 
        while ($row_category = $stmt->fetch_ASSOC()){
            extract($row_category);
            echo "<option value='{$packagename}'>{$packagename}</option>";
        }
 
    echo "</select>";
    ?>
            </div>
			<div class="" id="pfdisplay">
			<label for="pfare">package fare in birr:</label>
				<input type="text" class="form-control" name="pfare"value="<?php echo $pf; ?>"/><br />
       <!-- Records will be displayed here -->
    </div>
			<div class="form-group">
            	<button type="submit" class="btn btn-primary" name="check2">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;check2
                </button>
				</div>
				<div class="form-group">
			<label for="tfare">total tour fare in birr :</label>
            	<input type="text" class="form-control" name="totalfare"value="<?php echo $ttf; ?>"/>
            </div>
			
			<div class="form-group">
            	<button type="submit" class="btn btn-primary" name="ctour">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;confirm tour
                </button>	
					</div>
					</fieldset>
				</form>
				<?php
						}
				?>
			</div>	
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('Are you sure want to delete this record?');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
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