<?php
session_start();
	require_once('class.php');
$user = new USER();


	$action = $_REQUEST['action'];
	
	if($action==""){
		
		echo "select";
		
	}else{
		$hname=$_SESSION['hname'];
		$type=$_SESSION['type'];
		$stmt=$user->runQuery("SELECT cost from rooms WHERE room_number='$action' AND hname='$hname' AND type='$type'") or die(mysqli_error());
	}
	
	?>
	<div class="row">
	<?php
	if($stmt->num_rows==1){
		
		$row=$stmt->fetch_array();
		$_SESSION['cost']=$row['cost'];
		$cost=$_SESSION['cost'];
			extract($row);
			
	
			?>
			<p style="font-family:courier">room fare in birr:</p>
			<input type="text"class="form-control" name="rcost"value="<?php echo $cost; ?>"/><br />
			<?php		
		
	}else{
		
		?>
        <div>
		</div>
        <?php		
	}
	
	
	?>
	</div>