<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	session_start();
	require_once('class.php');
	$user=new user();
	$stmt = $user->runQuery("SELECT * FROM nomessage") or die(mysqli_error());
	$row=$stmt->fetch_array();
?>
<html lang = "eng">
	<head>
		<title>tour guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour guiding System - Ethiopia</label>
				<?php
				$q = $user->runQuery("SELECT * FROM `user` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
			   $f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
				<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;message(<?php echo $row['messagenum']; ?>) </a></li>
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
						echo $f['email'];
							//$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrator</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> User</a></li>
					</ul>
				</li>
				<li><li><a href = "tourist.php"><i class = "glyphicon glyphicon-user"></i> tourist</a></li></li>
				<li><li><a href = "hotel.php"><i class = "glyphicon glyphicon-book"></i> hotel</a></li></li>
				<li><li><a href = "guide.php"><i class = "glyphicon glyphicon-user"></i> guide</a></li></li>
				<li><li><a href = "place.php"><i class = "glyphicon glyphicon-book"></i> place</a></li></li>
				<li><li><a href = "dictionary.php"><i class = "glyphicon glyphicon-user"></i> dictionary</a></li></li>
				<li><li><a href = "package.php"><i class = "glyphicon glyphicon-user"></i> package</a></li></li>
				<li><li><a href = "addaattraction.php"><i class = "glyphicon glyphicon-user"></i> add attractions</a></li></li>
				
					<ul>
		
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
			<?php
$query = $user->runQuery("SELECT * FROM `message` where person='admin' ORDER BY `date` ASC") or die(mysqli_error());
?>
<?php
$stmt=$user->runQuery("update nomessage set messagenum=''") or die(mysqli_error());
?>
<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>place /message</Label>
				<a href = "admin.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>user name</th>
							<th>message</th>
							<th>date</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row = $query->fetch_array()){
$type=$row['type'];
$message=$row['message'];
$uname=$row['name'];
$date=$row['date'];
$status=$row['status'];
if($type=="place")
{
?>
			
						<tr>
							<td><?php echo $uname?></td>
							<td><?php echo $message?></td>
							<td><?php echo $date?></td>
							<td><center>
							<a class = "btn btn-sm btn-success" href = "place.php"><i class = "glyphicon glyphicon-edit"></i> add place</a> 
							<a onclick="confirmationDelete(this);return false;" href = "delete_message.php?id=<?php echo $row['id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
							</center></td>
						</tr>
					
				
		
<?php
}
else if($type=="tourist")
{
?>
<tr>
							<td><?php echo $uname?></td>
							<td><?php echo $message?></td>
							<td><?php echo $date?></td>
							<td><center>
							<?php
							if($status=="notconfirm")
							{
							?>
							<a class = "btn btn-sm btn-success" href = "confirm.php?id=<?php echo $row['name'];?>"><i class = "glyphicon glyphicon-edit"></i> confirm</a> 
							<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['name']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
							<?php
							}
							else 
							{
							?>
							<a class = "btn btn-sm btn-success"><i class = "glyphicon glyphicon-eject"></i> accepted</a> 
							                  <?php
			$id=$row['name'];
				  $query1 = "SELECT * FROM `account` WHERE `username` = '$id'";
		$stmt = $user->runQuery( $query1 );
		//$stmt->execute(array(':id'=>$id));
		$row1=$stmt->fetch_ASSOC();
				  ?>
							<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['name']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
							<?php
							}
							?>
				<a onclick="confirmationDelete(this);return false;" href = "delete_message.php?id=<?php echo $row['id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
						</tr>
<?php
}

}

?>
	              </tbody>
				</table>
			</div>
		<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                 
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> tourist Profile
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                       
                       	   <div id="dynamic-content">
                                        
                           <div class="row"> 
                                <div class="col-md-12"> 
                            	
                            	<div class="table-responsive">
                            	
                                <table class="table table-striped table-bordered">
								<tr>
                            	<th>profile picture</th>
                            	<td id="photo"><p><img src="user_images/<?php echo $row1['userpic']; ?>" height="150" width="150" id="photo"/></p></td>
                                </tr>
                           		<tr>
                            	<th>tourist Name</th>
                            	<td id="name"></td>
                                </tr>
                                  <tr>
                                <th>user name</th>
                                <td id="username"></td>
                                </tr>  
                                 <tr>
                                <th>email</th>
                                <td id="email"></td>
                                </tr> 								
                                <tr>
                            	<th>phone number</th>
                            	<td id="phone"></td>
                                </tr>
                                       		
                                <tr>
                                <th>residential address</th>
                                <td id="address"></td>
                                </tr>
                                       		
                                <tr>
                                <th>city</th>
                                <td id="city"></td>
                                </tr>
                                       		
                                <tr>
                                <th>country</th>
                                <td id="country"></td>
                                </tr>     		
                                </table>
                                
                                </div>
                                       
                                </div> 
                          </div>
                          
                          </div> 
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
       </div><!-- /.modal -->    
    
    </div>


<script src="../assets/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id'); // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
		$.ajax({
			url: 'gettouristinfo.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#photo').attr('src=user_images/'+data.userpic);
			$('#name').html(data.name);
			$('#username').html(data.username);
			$('#email').html(data.email);
			$('#phone').html(data.phoneno);
			$('#address').html(data.residentialaddress);
			$('#city').html(data.city);
			$('#country').html(data.country);
			$('#modal-loader').hide();    // hide ajax loader
		})
		.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
		
	});
	
});

</script>
<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
	</body>
		<script src = "../js/jquery.dataTables.js"></script>
		<script type = "text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
		$('#table1').DataTable();
	});
	
</script>
</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
<?php// require'script.php' ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
<script src="parsleyjs/dist/parsley.min.js"></script>
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>
</body>
</html>
