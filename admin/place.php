<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	require_once('class.php');
$user = new User();
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
    body{
        background-image: url(footer-bg.png);
    }
		
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
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour guiding System - Ethiopia</label>
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
				<label>ADD place</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body"width="100%">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:75%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
				   <div class="form-group">
                     <label for = "source">Source: </label>
                   <input type="text" class="form-control" name="source" placeholder="Enter source"required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
                   </div>
                    <div class="form-group">
                    <label for = "destination">Destination: </label>
                     <input type="text" class="form-control" name="destination" placeholder="Enter destination"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
                      </div>
					<div class = "form-inline">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "bdistance">bus:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "tdistance">train:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label for = "fdistance">flight:</label>
					</div>
					<div class = "form-inline">
					<label for = "distance">distance in km:</label>
						&nbsp;&nbsp;&nbsp;<input class = "form-control" name = "bdistance" type = "text" required = "required">
						<input class = "form-control" name = "tdistance" type = "text"required="required">
						<input class = "form-control" name = "fdistance" type = "text" required = "required">
					</div>
					<div class = "form-inline">
					<label for = "fare">travel fare in birr:</label>
						<input class = "form-control" name = "bfare" type = "text" required = "required">
						<input class = "form-control" name = "tfare" type = "text"required = "required">
						<input class = "form-control" name = "ffare" type = "text" required = "required">
					</div>
					<div class = "form-inline">
					<label for = "duration">travel timing:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class = "form-control" name = "bduration" type = "text" required />
						<input class = "form-control" name = "tduration"  type = "text"required />
						<input class = "form-control" name = "fduration" type = "text" required />
					</div>
					<div class = "form-group">
							<label for = "vistingplace">visiting place: </label>
							<input class = "form-control" type = "text"  name = "vistingplace"required = "required">
					</div>
							<button  class = "btn btn-primary" name = "save_place" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
					<?php require 'add_place.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>places list</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>source</th>
							<th>destination</th>
							<th>bus distance</th>
							<th>train distance</th>
							<th>flight distance</th>
							<th>bus fare </th>
							<th>train fare</th>
							<th>flight fare</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("SELECT * FROM `place` ORDER BY `place_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['source']?></td>
							<td><?php echo $fetch['destination']?></td>
							<td><?php echo $fetch['bdistance']?></td>
							<td><?php echo $fetch['tdistance']?></td>
							<td><?php echo $fetch['fdistance']?></td>
							<td><?php echo $fetch['bfare']?></td>
							<td><?php echo $fetch['tfare']?></td>
							<td><?php echo $fetch['ffare']?></td>

							<td><center><a class = "btn btn-sm btn-warning" href = "edit_place.php?id=<?php echo $fetch['place_id']?>&source=<?php echo $fetch['source']?>"><i class = "glyphicon glyphicon-edit"></i> Update</a> <a onclick="confirmationDelete(this);return false;" href = "delete_place.php?id=<?php echo $fetch['place_id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
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