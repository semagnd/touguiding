<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_hotel'])){
	$hn=$_POST["name"];
	$ha=$_POST["address"];
	$hc=$_POST["city"];
	$hs=$_POST["state"];
	$hco=$_POST["country"];
	$ht=$_POST["tele"];
	$hm=$_POST["mobile"];
	$hst=$_POST["star"];
	$hair=$_POST["air"];
	$hr=$_POST["rail"];
	$hd=$_POST["description"];
	$cn=$_POST["mname"];
	$cd=$_POST["designation"];
	$cm=$_POST["cmobile"];
	$ce=$_POST["email"];
	$novip=$_POST["novip"];
	$no1st=$_POST["no1st"];
	$nonor=$_POST["nonor"];
	$hstatus="notreserve";
    $addroom="notadd";
	$lan=$_POST["lan"];
	$lng=$_POST["lng"];
						$query = $user->reg_hotel($hn,$ha,$hc,$hs,$hco,$ht,$hm,$hst,$hair,$hr,$hd,$cn,$cd,$cm,$ce,$novip,$no1st,$nonor,$hstatus,$addroom,$lan,$lng);
						
   					
		}
		
