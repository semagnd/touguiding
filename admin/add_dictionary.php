<?php
require_once('class.php');
                          $user = new user();
		if(ISSET($_POST['save_dictionary']))
{  
 $total = $_POST['total'];

for($i=1; $i<=$total; $i++)
 {
	$English = $_POST["English$i"];
	$Amharic = $_POST["Amharic$i"];
		
						$query = $user->reg_dict($English,$Amharic);		
		}
		
}