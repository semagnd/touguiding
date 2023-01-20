<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_admin'])){
		$username = $_POST['username']; 
		$email = $_POST['email']; 
		$password = $user->encrypt($_POST['password']); 
		$firstname = $_POST['firstname']; 
		$middlename = $_POST['middlename']; 
		$lastname = $_POST['lastname']; 
		$section = 'admin'; 
		
						$query = $user->reg_user($username,$password,$firstname,$middlename,$lastname,$section,$email);			
$type="admin";
						$me=0;
$user->runQuery("insert into nomessage(messagenum,type) values('$me','$type')") or die(mysqli_error());							
		}
		
