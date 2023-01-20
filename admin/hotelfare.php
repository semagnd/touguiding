<?php

	require_once('class.php');
$user = new user();

	$action = $_REQUEST['action'];
	
	if($action==""){
		
		echo "select";
		
	}else{
		
		$stmt=$user->runQuery("SELECT DISTINCT `type` from `rooms` WHERE `hname`='$action'");
	}
	
	?>
	<div class="row">
	<label for="roomtype">room number:</label>
			<select class='form-control' name='roomtype' id="getroomtype">
	<?php
	if($stmt->num_rows > 0){
		
		while($row=$stmt->fetch_array())
		{
			extract($row);
	
			?>
			<div>
			<div>
			
			<option class="form-control" disabled="disabled"name="roomtype"value="<?php echo $type; ?>"><?php echo $type; ?></option></div><br />
			
			</div>
			<?php		
		}
		?>
		</select>
		<?php
		
	}else{
		
		?>
        <div>
		</div>
        <?php		
	}
	
	
	?>
	</div>