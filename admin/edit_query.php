<?php
require_once('class.php');
     $user = new user();
	$id = $_GET['id'];
	//$last = $_GET['lastname'];
	if(ISSET($_POST['edit_admin'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $user->encrypt($_POST['password']);
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$section = 'admin';
			$user->runQuery("UPDATE `user` SET `username` = '$username', `email`='$email',`password` = 
			'$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = 
			'$lastname', `section` = '$section' ,email='$email'WHERE `user_id` = '$id'") or die(mysqli_error());
			?>
			<script>
		window.location='admin.php';
			</script>
			<?php
		}
	if(ISSET($_POST['edit_user'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $user->encrypt($_POST['password']);
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$section = $_POST['section'];
			$user->runQuery("UPDATE `user` SET `username` = '$username', `email`='$email',`password` = 
			'$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = 
			'$lastname', `section` = '$section' ,email='$email'WHERE `user_id` = '$id'") or die(mysqli_error());
			?>
			<script>
		window.location='user.php';
			</script>
			<?php
			//header("location: user.php");
		}	
		if(ISSET($_POST['edit_guide']))
		{
			$gn = $_POST['name'];
	        $ga= $_POST['age'];
			$ge= $_POST['email'];	
			$gp= $_POST['phone'];	
			$gl =$_POST['language'];	
			$gey= $_POST['experience'];	
			$ag= $_POST['about']; 
			$stmt=$user->runQuery("UPDATE `guide` SET `gname` = '$gn', `gage` = '$ga', 
			`gemail` = '$ge', `gphoneno` = '$gp', `knownlang` = '$gl', `exprience` = '$gey', 
			`about` = '$ag' WHERE `guide_id` = '$id'") or die(mysqli_error());
			?>
			<script>
		window.location='guide.php';
			</script>
			<?php

		}	
if(ISSET($_POST['edit_hotel'])){
	$hn=$_POST["name"];
	$ha=$_POST["address"];
	$hc=$_POST["city"];
	$hp=$_POST["pin"];
	$hs=$_POST["state"];
	$hco=$_POST["country"];
	$ht=$_POST["tele"];
	$hm=$_POST["mobile"];
	$hst=$_POST["star"];
	$hair=$_POST["air"];
	$hr=$_POST["rail"];
	$hd=$_POST["description"];
			$user->runQuery("UPDATE `hotel` SET `hname` = '$hn', `haddress` = '$ha', `city` = '$hc', 
			`hpincode` = '$hp', `hstate` = '$hs', `hcountry` = '$hco', `hteleno` = '$ht', `hmobileno` = '$hm', 
		`hstar` = '$hst', `hairport` = '$hair', `hrail` = '$hr', `hdescription` = '$hd' WHERE `hotel_id` = '$id'") or die(mysqli_error());
		?>
			<script>
		window.location='hotel.php';
			</script>
			<?php
			//header("location: hotel.php");
		}
if(ISSET($_POST['edit_place'])){
	$s = $_POST['source'];
	$d= $_POST['destination'];
	$bd= $_POST['bdistance'];	
    $td= $_POST['tdistance'];	
    $fd =$_POST['fdistance'];	
    $bf= $_POST['bfare'];	
    $tf= $_POST['tfare'];	
    $ff= $_POST['ffare'];	
    $bdu=$_POST['bduration'];	
    $tdu=$_POST['tduration'];	
    $fdu=$_POST['fduration'];	
    $vp=  $_POST['vistingplace'];
			$user->runQuery("UPDATE `place` SET `source` = '$s', `destination` = '$d',`vistingplace` = '$vp',
			`bdistance` = '$bd', `tdistance` = '$td', `fdistance` = '$fd', `bfare` = '$bf', `tfare` = '$tf', `ffare` =
			'$ff',`bduration` = '$bdu', `tduration` = '$tdu', `fduration` = '$fdu' WHERE `place_id` = '$id'") or die(mysqli_error());
			?>
			<script>
		window.location='place.php';
			</script>
			<?php
			//header("location: hotel.php");
		}		
if(ISSET($_POST['edit_package'])){
	$pn = strip_tags($_POST['pn']);
	$pr= strip_tags($_POST['pr']);
	$pd = strip_tags($_POST['pd']);		
			$user->runQuery("UPDATE `package` SET `packagename` = '$pn', `packagerate` = 
			'$pr', `packagedetails` = '$pd' WHERE `package_id` = '$id'") or die(mysqli_error());
			?>
			<script>
		window.location='package.php';
			</script>
			<?php
			//header("location: admin.php");
		}
		if(ISSET($_POST['edit_dictionary'])){
		$English = $_POST["English"];
	$Amharic = $_POST["Amharic"];
	$user->runQuery("UPDATE `dictionary` SET `English` = '$English', `Amharic` = '$Amharic' WHERE `id` = '$id'") or die(mysqli_error());
	?>
			<script>
		window.location='dictionary.php';
			</script>
			<?php
			
	}