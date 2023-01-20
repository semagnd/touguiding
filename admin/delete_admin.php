<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `user` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:admin.php");
