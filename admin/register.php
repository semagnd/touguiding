<?php
include_once "header.php";
require_once('class.php');
$user = new user();
if(isset($_POST['submit']))
{   $imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];	
	$n = $_POST['name'];
	$uname= $_POST['username'];
	$upass= $user->encrypt($_POST['password']);	
    $umail= $_POST['email'];	
    $pn =$_POST['phone'];	
    $ra= $_POST['address'];	
    $c= $_POST['city'];
    $co= $_POST['country'];	
	$section="tourist";
	$code = $user->encrypt(uniqid(rand()));
	if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
		$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		if(!isset($errMSG))
		{
		     $user = new user();
			$errors = [];

	if ($user->email_exists($uname,$umail))
	{
		$errors[] = "$umail is already registered.";
		
	}

	if (!empty($errors)) {
		foreach ($errors as $error) {
			$user->validation_errors($error);
		}
	}
			else
			{
			$stmt=$user->account($userpic,$n,$uname,$upass,$umail,$pn,$ra,$c,$co,$section);
		    $stmt1=$user->reg_touser($uname,$umail,$upass,$code);	

           $id = $user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to Ethiopian tour Guiding!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/tour guiding system/admin/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
				$email=$umail;		
			$user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    $id.Please click on the confirmation link in the email to create your account. 
			  		</div>
					";			
?>

<script>
alert("successfully registered");
</script>
<?php
//$user->redirect("index.php");
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
	</body>
	<div class="row">
		<div class="col-md-12">
		<?php $user->display_message(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<?php if(isset($msg)) echo $msg;  ?>
			<form role="form" method="post" name="registration_form"enctype="multipart/form-data">
				<h2>Please Sign Up <small>It's free and always will be.</small></h2>
				<hr class="colorgraph">
						<div class="form-group">
    	<h4 style="font-family:courier" >Profile Img.</h4>
        <input class="input-group" type="file" name="user_image" accept="image/*" /></td>
         </div>
						<div class="form-group">
							<div class="form-group">
							<input type="text" name="name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup">
						</div>
						<div class="form-group">
						 <input type="text" class="form-control"name="username" required data-parsley-pattern="^[a-zA-Z ]+$" placeholder="enter your username"required data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-trigger="keyup" />
						</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required data-parsley-type="email" data-parsley-trigger="keyup">
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" id="pass2"placeholder="Password" tabindex="5" required>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>
						</div>
					</div>
				</div>
				<div class="form-group">
			<p style="font-family:courier">phone number:</p>
            	<input type="text" class="form-control"name="phone" required data-parsley-type="number" required data-parsley-length="[10,10]" data-parsley-trigger="keyup"placeholder="10 digit number" />
            </div>
			<div class="form-group">
			<input type="text" class="form-control"name="address" required data-parsley-type="^[a-zA-Z ]+$" data-parsley-trigger="keyup"placeholder="Enter your residential address" />
				</div>
				<div class="form-group">
				<input type="text" class="form-control"name="city" required data-parsley-type="^[a-zA-Z ]+$"data-parsley-trigger="keyup" placeholder="Enter your city" />
				</div>
				<div class="form-group">
				<input type="text" class="form-control"name="country" required data-parsley-type="^[a-zA-Z ]+$"data-parsley-trigger="keyup" placeholder="Enter your country" />
				</div>
				

				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
					<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
				</div>
			</form>
		</div>
	</div>
	<!-- Modal -->
<script>
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

<script src="parsleyjs/dist/parsley.min.js"></script>
	
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>
<?php
include_once "footer.php";
?>