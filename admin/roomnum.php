<?php
session_start();
	require_once('class.php');
$user = new user();

	$action = $_REQUEST['action'];
	
	if($action==""){
		
		echo "select";
		
	}else{
		$hname=$_SESSION['hname'];
		$stmt=$user->runQuery("SELECT  `room_number`,`type` from `rooms` WHERE `type`='$action' AND hname='$hname' AND status='notreserve'");
	}
	
	?>
	<script type="text/javascript">
$(document).ready(function()
{	
	// code to get all records from table via select box
	$("#getroomnum").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
		$.ajax
		({
			url: 'roomcost.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#displaycost").html(r);
			} 
		});
	})
	// code to get all records from table via select box
});
</script>
	<div class="row">
	<label for="roomtype">room number:</label>
			<select class='form-control' name='roomnumber' id="getroomnum">
			 <option value='' selected='selected'>Select room number...</option>";
	<?php
	if($stmt->num_rows > 0){
		
		while($row=$stmt->fetch_array())
		{
		$_SESSION['type']=$row['type'];
			extract($row);
	
			?>
			<div>
			<div>
			
			<option class="form-control" name="roomnumber"value="<?php echo $room_number; ?>"><?php echo $room_number; ?></option></div><br />
			
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