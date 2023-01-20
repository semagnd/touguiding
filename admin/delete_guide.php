<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `guide` WHERE `guide_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:guide.php");
