<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `place` WHERE `place_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:place.php");
