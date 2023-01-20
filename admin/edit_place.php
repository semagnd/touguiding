<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	require_once('class.php');
$user = new User();
?>
<html lang = "eng">
	<head>
		<title>Tour guiding System</title>
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
		<div class = "panel panel-success">	
		<?php
			require_once('class.php');
                          $user = new user();
			$query = $user->runQuery("SELECT * FROM `place` WHERE `place_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>EDIT place</label>
				<a href = "place.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:75%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class="form-group">
                     <label for = "source">Source: </label>
                   <input type="text" class="form-control" name="source" value = "<?php echo $fetch['source']?>"required data-parsley-pattern="^[a-zA-Z ]+$" />
                   </div>
                    <div class="form-group">
                    <label for = "destination">Destination: </label>
                     <input type="text" class="form-control" name="destination" value = "<?php echo $fetch['destination']?>"required data-parsley-pattern="^[a-zA-Z ]+$"/>
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
						&nbsp;&nbsp;&nbsp;
						<input class = "form-control" name = "bdistance" type = "text"value = "<?php echo $fetch['bdistance']?> "required = "required">
						<input class = "form-control" name = "tdistance" type = "text"value = "<?php echo $fetch['tdistance']?>" required="required">
						<input class = "form-control" name = "fdistance" type = "text" value = "<?php echo $fetch['fdistance']?>" required = "required">
					</div>
					<div class = "form-inline">
					<label for = "fare">travel fare in birr:</label>
						<input class = "form-control" name = "bfare" type = "text"value = "<?php echo $fetch['bfare']?>" required >
						<input class = "form-control" name = "tfare" type = "text"value = "<?php echo $fetch['tfare']?>"required >
						<input class = "form-control" name = "ffare" type = "text"value = "<?php echo $fetch['ffare']?>" required >
					</div>
					<div class = "form-inline">
					<label for = "duration">travel timing:</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class = "form-control" name = "bduration" type = "text"value = "<?php echo $fetch['bduration']?>" required />
						<input class = "form-control" name = "tduration"  type = "text"value = "<?php echo $fetch['tduration']?>"required />
						<input class = "form-control" name = "fduration" type = "text"value = "<?php echo $fetch['fduration']?>" required />
					</div>
					<div class = "form-group">
							<label for = "vistingplace">visiting place: </label>
							<input class = "form-control" type = "text"  name = "vistingplace"value = "<?php echo $fetch['vistingplace']?>"required data-parsley-pattern="^[a-zA-Z ]+$">
					</div>
							<button  class = "btn btn-warning" name = "edit_place" ><span class = "glyphicon glyphicon-edit"></span> SAVE</button>
							<br />
					</div>
					<?php require 'edit_query.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Tour guiding System 2017</label>
	</div>
<?php require'script.php' ?>
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