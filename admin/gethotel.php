<?php
		
	header('Content-type: application/json; charset=UTF-8');
		 
	//session_start();
require_once('class.php');
$user = new USER();

/*if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}*/
	
	if (isset($_POST['id']) && !empty($_POST['id'])) {
			
		$id = intval($_POST['id']);
		$query = "SELECT * FROM `hotel` WHERE `hotel_id` = '$id'";
		$stmt = $user->runQuery( $query ) or die(mysqli_error());
		//$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch_ASSOC();						
		
		echo json_encode($row);
		exit;
	}		