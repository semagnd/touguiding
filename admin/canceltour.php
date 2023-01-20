<?php
	require_once('class.php');
                          $user = new user();
						  $stm=$user->runQuery("select * from booktour WHERE `email` = '$_GET[id]'") or die(mysqli_error());
						  $row=$stm->fetch_array();
						  $name=$row['name'];
$gname=$row['gname'];
$hname=$row['hname'];
$roomtype=$row['room_type'];
$roomnumber=$row['room_number'];
						  $stmt=$user->runQuery("update guide set status='notreserve' where gname='$gname'") or die(mysqli_error());
if($stmt==true)
{
$stmt=$user->runQuery("update rooms set status='notreserve' where hname='$hname' AND type='$roomtype' AND room_number='$roomnumber'") or die(mysqli_error());
}
						$query = $user->runQuery("DELETE FROM `booktour` WHERE `email` = '$_GET[id]'") or die(mysqli_error());
							$query = $user->runQuery("DELETE FROM `message` WHERE `name` = '$name'and person='$gname'") or die(mysqli_error());
					
	header("location:booktour.php");
	?>
