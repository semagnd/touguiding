<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `hotel` WHERE `hotel_id` = '$_GET[id]'") or die(mysqli_error());
	header("location:hotel.php");
