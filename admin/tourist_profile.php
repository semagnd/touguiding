<?php
require_once 'logincheck.php';
error_reporting( ~E_NOTICE );
session_start();
require_once('class.php');
$user = new user();	
$stmt1= $user->runQuery("SELECT * FROM account where email='$_SESSION[email]'") or die(mysqli_error());
	$row1=$stmt1->fetch_array();
	$type=$row1['name'];
	$stmt2 = $user->runQuery("SELECT * FROM nomessage where type='$type'") or die(mysqli_error());
	$row2=$stmt2->fetch_array();
$email=$_SESSION['email'];
$stmt = $user->runQuery("SELECT * FROM account where email ='$email'");
		$row = $stmt->fetch_array();
		extract($row);
		$id=$row['id'];
	if(isset($_POST['btn_save_updates']))
	{	
	$n = $_POST['name'];
	$uname= $_POST['username'];
	$upass= $user->encrypt($_POST['password']);	
    $umail= $_POST['email'];	
    $pn =$_POST['phone'];	
    $ra= $_POST['address'];	
    $c= $_POST['city'];
    $co= $_POST['country'];	
	$imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];	
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $row['userpic']; // old image from database
		}	
						
			
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			 if($user->update($userpic,$n,$uname,$upass,$umail,$pn,$ra,$c,$co,$id )){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<html lang = "eng">
	<head>
		<title>Tour Guiding System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.svg" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<style type="text/css">
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
		<img src = "../images/logo.svg" style = "float:left;" height = "55px" /><label class = "navbar-brand">Tour Guiding System - Ethiopia</label>
						<?php
				$q = $user->runQuery("SELECT * FROM `user` WHERE `email` = '$_SESSION[email]'") or die(mysqli_error());
			   $f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
				<li><a data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-envelope"></span>&nbsp;message(<?php echo $row2['messagenum']; ?>) </a></li>
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
	<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['inserted']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered 
                 </div>
                 <?php
			}
			?>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "#"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				 <li><li><a href = "viewguide.php"><i class = "glyphicon glyphicon-eye-open"></i> view guide</a></li></li>
				<li><li><a href = "viewhotel.php"><i class = "glyphicon glyphicon-star"></i>view hotel availability</a></li></li>
				<li><li><a href = "viewpackage.php"><i class = "glyphicon glyphicon-eye-open"></i>view package</a></li></li>
				<li><li><a href = "viewdictionary.php"><i class = "glyphicon glyphicon-eye-open"></i>view dictionary</a></li></li>
				<li><li><a href = "booktour.php"><i class = "glyphicon glyphicon-book"></i>book tour</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> map</a>
					<ul>
						<li><a href = "viewlocationpath.php"><i class = "glyphicon glyphicon-cog"></i> direction view</a></li>
						<li><a href = "map.php"><i class = "glyphicon glyphicon-cog"></i> view your location</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
			<div class = "panel-heading">
			<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">send message</h4>
        </div>
		
        <div class="modal-body">
		<label for="message">message</label>
		<?php
		$name=$row1['name'];
$sql1= $user->runQuery("SELECT * FROM `message` where person='$name' ORDER BY `date` DESC") or die(mysqli_error());

while($row4=$sql1->fetch_array())
{
	?>
	</br>
	</br>
		<div>
		
		<label style = "font-size:18px;" class = "text-muted"><?php echo $row4['message']; ?></label>
		 <p class="glyphicon glyphicon-calendar"><?php echo $row4['date'];?></p>

		</div>	

		<?php
}
?>
<div>		
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
        </div>
      </div>
      
    </div>
  </div>
			</div>
				<label>profile</label>
				<a href = "tourist_profile.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multipart/form-data" >
					<div class = "panel panel-default" style = "width:100%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						 <div class="form-group">
    	<p><img src="user_images/<?php echo $userpic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
         </div>
          <div class="form-group">
			<label  >Name:</label>
            <input type="text"name="name" class="form-control" required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup" placeholder="enter your name"value="<?php echo $row['name']; ?>" />
            </div>
            <div class="form-group">
			<label  >user name:</label>
            <input type="text" class="form-control"name="username" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"placeholder="enter your username"value="<?php print $row['username']; ?>" />
            </div>
            <div class="form-group">
			<label  >password:</label>
           <input type="text" name="password" class="form-control" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup" placeholder="enter the password"value="<?php echo md5($row['password']); ?>" />	
            </div>
            <div class="form-group">
			<label  >Email ID:</label>
            	<input type="email" class="form-control"name="email" required data-parsley-type="email" data-parsley-trigger="keyup" placeholder="me@example.com" value="<?php echo $row['email']; ?>"/>
            </div>
            <div class="form-group">
			<label  >phone number:</label>
            	<input type="text" class="form-control"name="phone" required data-parsley-type="number" required data-parsley-length="[10,10]" data-parsley-trigger="keyup"placeholder="10 digit number"value="<?php echo $row['phoneno']; ?>" />
            </div>
            <div class="form-group">
			<label  >residential Address:</label>
            	<input type="text" class="form-control"name="address" required data-parsley-type="^[a-zA-Z ]+$"data-parsley-trigger="keyup" placeholder="Enter your residential address" value="<?php echo $row['residentialaddress']; ?>"/>
            </div>
			<div class="form-group">
			<label  >City:</label>
            	<input type="text" class="form-control"name="city" required data-parsley-type="^[a-zA-Z ]+$"data-parsley-trigger="keyup"placeholder="Enter your city"value="<?php echo $row['city']; ?>" />
            </div>
			<div class="form-group">
			<label  >Country:</label>
            	<input type="text" class="form-control"name="country" required data-parsley-type="^[a-zA-Z ]+$"data-parsley-trigger="keyup" placeholder="Enter your country" value="<?php echo $row['country']; ?>"/>
            </div>
			<div class="form-group">
			<button type="submit" name="btn_save_updates" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
 </div>
				</form>
			</div>	
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright tour guiding System 2017</label>
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