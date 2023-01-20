<?php
session_start();
	require_once('class.php');
$user = new user();

	$action = $_REQUEST['action'];
	
	if($action==""){
		
		echo "select";
		
	}else{
		
		$stmt=$user->runQuery("SELECT DISTINCT `type`,`hname` from `rooms` WHERE `hname`='$action'");
	}
	
	?>
	<script type="text/javascript">
$(document).ready(function()
{	
	// code to get all records from table via select box
	$("#getroomtype").change(function()
	{				
		var id = $(this).find(":selected").val();

		var dataString = 'action='+ id;
		$.ajax
		({
			url: 'roomnum.php',
			data: dataString,
			cache: false,
			success: function(r)
			{
				$("#display1").html(r);
			} 
		});
	})
	// code to get all records from table via select box
});
</script>
	<div class="row">
	<label for="roomtype">room type:</label>
			<select class='form-control' name='roomtype' id="getroomtype">
			 <option value='' selected='selected'>Select room type...</option>";
	<?php
	if($stmt->num_rows > 0){
		
		while($row=$stmt->fetch_array())
		{
		$_SESSION['hname']=$row['hname'];
			extract($row);
	
			?>
			<div>
			<div>
			<option class="form-control" name="roomtype"value="<?php echo $type; ?>"><?php echo $type; ?></option></div><br />
			
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