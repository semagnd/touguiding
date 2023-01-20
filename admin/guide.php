<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	require_once("class.php");
	$user=new User();
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
				<label>ADD ADMINISTRATOR</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
			<div class = "panel-body">
			<div class="form-group">
			<label for = "name">guide name: </label>
            <input type="text" class="form-control" name="name" placeholder="entergiude name"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
			 <div class="form-group">
			<label for = "sex">Gender: </label>
            <input type="text" class="form-control" name="sex" placeholder="enter giude gender"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for = "age">guide age: </label>
            <input type="text" class="form-control" name="age" placeholder="guide age"required data-parsley-type="number" data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for = "email">guide email: </label>
            <input type="email" class="form-control" name="email" placeholder="Enter E-Mail ID" required data-parsley-type="email"required data-parsley-trigger="keyup" />
            </div>
            <div class="form-group">
			<label for = "phone">guide phone number: </label>
            	<input type="text" class="form-control" name="phone" placeholder="Enter guide phone number"required data-parsley-type="number"data-parsley-length="[10, 10]"required data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for = "language">guide known language: </label>
            	<input type="text" class="form-control" name="language" placeholder="Enter guide hnown language" required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup"/>
            </div>
            <div class="form-group">
			<label for = "experience">guide experience: </label>
            	<input type="text" class="form-control" name="experience" placeholder="Enter guide experience"required data-parsley-type="alphanum" data-parsley-trigger="keyup" />
            </div>
            <div class="form-group">
			<label for = "about">about guide: </label>
            	<input type="text" class="form-control" name="about" placeholder="Enter about the guide"required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" />
            </div>
							<button  class = "btn btn-primary" name = "save_guide" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
					<?php require 'add_guide.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>ACCOUNTS / guide</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>name</th>
							<th>age</th>
							<th>email</th>
							<th>phone number</th>
							<th>known language</th>
							<th>experience</th>
							<th>about</th>
							<th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						require_once('class.php');
                          $user = new user();
						$query = $user->runQuery("SELECT * FROM `guide` ORDER BY `guide_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['gname']?></td>
							<td><?php echo $fetch['gage']?></td>
							<td><?php echo $fetch['gemail']?></td>
							<td><?php echo $fetch['gphoneno']?></td>
							<td><?php echo $fetch['knownlang']?></td>
							<td><?php echo $fetch['exprience']?></td>
							<td><?php echo $fetch['about']?></td>
							<td><center><a class = "btn btn-sm btn-warning" href = "edit_guide.php?id=<?php echo $fetch['guide_id']?>&gname=<?php echo $fetch['gname']?>"><i class = "glyphicon glyphicon-edit"></i> Update</a> <a onclick="confirmationDelete(this);return false;" href = "delete_guide.php?id=<?php echo $fetch['guide_id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
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