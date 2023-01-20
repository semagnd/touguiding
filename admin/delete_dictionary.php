<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `dictionary` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
	header("location:dictionary.php");
