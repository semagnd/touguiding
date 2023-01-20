<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	require_once('class.php');
	$user=new user();
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
		<style type="text/css">
  
		
.wrapper{
	//padding-top: 20px;
	padding-top: 50px;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#843534;
    box-shadow: none;
}


input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#843534;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}


.parsley-errors-list {
    list-style-type: none;
    opacity: 0;
    transition: all .3s ease-in;

    color: #d16e6c;
    margin-top: 5px;
    margin-bottom: 0;
  padding-left: 0;
}

.parsley-errors-list.filled {
    opacity: 1;
    color: #a94442;
}

		</style>
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour guiding system System - Ethiopia</label>
			<?php
				$q = $user->runQuery("SELECT * FROM `user` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
			   $f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
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
				
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		
		<div id = "add" class = "panel panel-success">	
		
			<div class = "panel-heading">
				<label>ADD HOTEL</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:95%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
					<fieldset style="width:40%;
	border:none;
	border-radius:5px;
	padding:1em;
	margin:0 1em;">
			<div class="form-group">
			<label for="name">Name of the hotel:</label>
            <input type="text" class="form-control" name="name" placeholder="enter name of the hotel"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for="address">address:</label>
            <input type="text" class="form-control" name="address" placeholder="enter hotel address"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for="city">city:</label>
            <input type="text" class="form-control" name="city" placeholder="enter hotel city" required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup" />
            </div>
            <div class="form-group">
			<label for="lat">:latitude</label>
            	<input type="text" class="form-control" name="lan" placeholder="Enter latitude"data-parsley-type="float"required data-parsley-trigger="keyup"/>
            </div>
			<div class="form-group">
			<label for="lng">:longitude</label>
            	<input type="text" class="form-control" name="lng" placeholder="Enter longitude"required data-parsley-pattern="^[0-9].[0-9]+$"required data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for="state">state:</label>
            	<input type="text" class="form-control" name="state" placeholder="enter hotel state" required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for="country">country:</label>
            	<input type="text" class="form-control" name="country" placeholder="Enter hotel country"required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for="tele">Telephone Number:</label>
            	<input type="text" class="form-control" name="tele" placeholder="Enter hotel telephone number"required data-parsley-length="[10, 10]"data-parsley-type="number" data-parsley-trigger="keyup"data-parsley-trigger="keyup" />
            </div>
			<div class="form-group">
			<label for="mobile">Mobile Number:</label>
            	<input type="text" class="form-control" name="mobile" placeholder="Enter hotel mobile number"required data-parsley-length="[10, 10]"data-parsley-type="number" data-parsley-trigger="keyup"data-parsley-trigger="keyup"/>
            </div>
			<div class="form-group">
			<label for="star">star category:</label>
            	<input type="text" class="form-control" name="star" placeholder="Enter hotel star category"required data-parsley-pattern="^[0-9][a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
			</fieldset>
			<fieldset style="width:40%;
	border:none;
	border-radius:5px;
	padding:1em;
	margin:0 1em;">
			<div class="form-group">
			<label for="air">nearest airport:</label>
            	<input type="text" class="form-control" name="air" placeholder="Enter hotel nearest airport"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
			<div class="form-group">
			<label for="rail">nearest railway:</label>
            	<input type="text" class="form-control" name="rail" placeholder="Enter hotel nearest railway station"required data-parsley-trigger="keyup"/>
            </div>
			<div class="form-group">
			<label for="description">description:</label>
            	<textarea class="form-control" width="100%" name="description" placeholder="Enter hotel description"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/></textarea>
            </div>
			<div class="form-group">
			<label for="mname">hotel manager name:</label>
            	<input type="text" class="form-control" name="mname" placeholder="Enter hotel manager name"required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" />
            </div>
			<div class="form-group">
			<label for="designation">Designation:</label>
            	<input type="text" class="form-control" name="designation" placeholder="Enter designation"required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
            </div>
			<div class="form-group">
			<label for="cmobile">mobile number:</p>
            	<input type="text" class="form-control" name="cmobile" placeholder="Enter mobile number"required data-parsley-length="[10, 10]"data-parsley-type="number" data-parsley-trigger="keyup"data-parsley-trigger="keyup" />
            </div>
			<div class="form-group">
			<label for="email">Email Id:</label>
            	<input type="text" class="form-control" name="email" placeholder="Enter Email Id"required data-parsley-type="email" data-parsley-trigger="keyup"/>
            </div>
			<div class="form-inline">
			<label for="fare">number of vip:</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" class="form-control" name="novip" required />
			</div>
			<div class="form-inline">
           <label for="fare"> number of 1st level:</label>&nbsp;
		 <input type="text" class="form-control" name="no1st" required />
		 </div>
		 <div class="form-inline">
		    <label for="fare"> number of normal:</label>
			&nbsp;&nbsp;&nbsp;
			<input type="text" class="form-control" name="nonor"required />
            </div>
			
			
			
							<button  class = "btn btn-primary" name = "save_hotel" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
					</fieldset>
					<?php require 'add_hotel.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
		<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> &nbsp; <?php echo $error; ?>
			  </div>
                     <?php
				}
			}
			else if(isset($_GET['inserted']))
			{
				 ?>
                 <div class="alert alert-info">
				 <button class='close' data-dismiss='alert'>&times;</button>
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered </a> here
                 </div>
                 <?php
			}
			?>
			<div class = "panel-heading">
				<label> hotel</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>hotel name</th>
							<th>hotel address</th>
							<th>city</th>
							<th>hotel telephone</>
							<th>nearest airport</th>
							<th>nearest rail</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("SELECT * FROM `hotel` ORDER BY `hotel_id` ASC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['hname']?></td>
							<td><?php echo $fetch['haddress']?></td>
							<td><?php echo $fetch['city']?></td>
							<td><?php echo $fetch['hteleno']?></td>
							<td><?php echo $fetch['hairport']?></td>
							<td><?php echo $fetch['hrail']?></td>
							<td><center><a class = "btn btn-sm btn-warning" href = "edit_hotel.php?id=<?php echo $fetch['hotel_id']?>&hname=<?php echo $fetch['hname']?>"><i class = "glyphicon glyphicon-edit"></i> Update</a> 
							<a onclick="confirmationDelete(this);return false;" href = "delete_hotel.php?id=<?php echo $fetch['hotel_id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a>
							<?php
							if($fetch['addroom']=='notadd')
							{
								?>
							<a class = "btn btn-sm btn-success" href = "room.php?id=<?php echo $fetch['hotel_id']?>"><i class = "glyphicon glyphicon-plus"></i> addroom</a></center></td>
							<?php
							}
							?>
						</tr>
					<?php
						}
					
					?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
	</div>
	
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('Are you sure want to delete this record?');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
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