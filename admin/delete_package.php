<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `package` WHERE `package_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:package.php");
