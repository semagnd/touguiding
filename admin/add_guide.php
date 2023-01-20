<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_guide'])){
	$gn = $_POST['name'];
	$ga= $_POST['age'];
	$ge= $_POST['email'];	
    $gp= $_POST['phone'];	
    $gl =$_POST['language'];	
    $gey= $_POST['experience'];	
    $ag= $_POST['about']; 
	$sex=$_POST['sex'];
	$gstatus="notreserve";
		
						$query = $user->reg_guide($gn,$ga,$ge,$gp,$gl,$gey,$ag,$gstatus,$sex);	
						$type=$_POST['name'];
						$me=0;
$user->runQuery("insert into nomessage(messagenum,type) values('$me','$type')") or die(mysqli_error());						
		}
		
