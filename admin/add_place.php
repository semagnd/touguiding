<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_place'])){
	$s = $_POST['source'];
	$d= $_POST['destination'];
	$bd= $_POST['bdistance'];	
    $td= $_POST['tdistance'];	
    $fd =$_POST['fdistance'];	
    $bf= $_POST['bfare'];	
    $tf= $_POST['tfare'];	
    $ff= $_POST['ffare'];	
    $bdu=$_POST['bduration'];	
    $tdu=$_POST['tduration'];	
    $fdu=$_POST['fduration'];	
    $vp=  $_POST['vistingplace'];	
		
						$query = $user->reg_place($s,$d,$vp,$bd,$td,$fd,$bf,$tf,$ff,$bdu,$tdu,$fdu);		
		}