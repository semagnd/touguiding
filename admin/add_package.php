<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_package'])){
	$pn = strip_tags($_POST['pn']);
	$pr= strip_tags($_POST['pr']);
	$pd = strip_tags($_POST['pd']);		
		
						$query = $user->package($pn,$pr,$pd);		
		}