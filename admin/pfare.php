<?php

	require_once('class.php');
$user = new USER();


	$action = $_REQUEST['action'];
	
	if($action==""){
		
		echo "select";
		
	}else{
		
		$stmt=$user->runQuery("SELECT pfare from package WHERE packagename='$action'") or die(mysqli_error());
	}
	
	?>
	<div class="row">
	<?php
	if($stmt->num_rows > 0){
		
		while($row=$stmt->fetch_ASSOC())
		{
			extract($row);
	
			?>
			<p style="font-family:courier">package fare in birr:</p>
			<input type="text" class="form-control" name="pfare"value="<?php echo $pfare; ?>"/><br />
			<?php		
		}
		
	}else{
		
		?>
        <div>
		</div>
        <?php		
	}
	
	
	?>
	</div>