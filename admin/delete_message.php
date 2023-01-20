<?php
	require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("DELETE FROM `message` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
	header("location:message.php");
