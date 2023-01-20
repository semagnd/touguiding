<?php
if (isset($_POST['sign']))
{
	$email		= $_POST['email'];
	$password	= $user->encrypt($_POST['password']);

	$sql = "SELECT section,email, password,userStatus FROM user WHERE email = '$email' AND password = '$password'";
	$result = $user->runQuery($sql);
$row=$result->fetch_array();
	if ($result->num_rows == 1) {
	$section=$row['section'];
if($row['userStatus']=="Y")
	{
	if($section=="admin")
	{
		if (isset($_POST['remember'])) {
			setcookie('email', $email, time() + 86400);
		}

		$_SESSION['email'] = $email;

		$user->redirect("home.php");
		exit;
		}
	else if($section=="tourist")
	{
		if (isset($_POST['remember'])) {
			setcookie('email', $email, time() + 86400);
		}

		$_SESSION['email'] = $email;

		$user->redirect("tourist_profile.php");
		exit;
		}
	else if($section=="guide")
	{
		if (isset($_POST['remember'])) {
			setcookie('email', $email, time() + 86400);
		}

		$_SESSION['email'] = $email;

		$user->redirect("guidehome.php");
		exit;
		}
	}
	else
				{
						$user->redirect("login.php?inactive");
					exit;
				}	
	}	else {
		$user->set_message('<div class="alert alert-warning" role="alert" col-md-12"><p>Wrong username or password.</p></div>');
	}
}
?>