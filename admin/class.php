<?php 
	include "dbconn.php";

	class User{
		
		public $conn;
		public $set_message;
		public function __construct(){
			$this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
			if(mysqli_connect_errno()) {
	 
				echo "Error: Could not connect to database.";
	 
			exit;
 
			}
		}
public function lasdID()
	{
		$stmt = $this->conn->insert_id;
		return $stmt;
	}
        public function runQuery($sql){
           $stmt=  $this->conn->query($sql) ;
            return $stmt;
            
        }
		public function totalmessage($type)
{
try
{

$stmt=$this->conn->query("update nomessage set messagenum=messagenum+1 where type='$type'") or die(mysqli_error);
}
catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
}
public function booktour($name,$email,$phone,$address,$country,$ts,$tdd,$depart,$backdate,$twn,$tf,$room_fare,$pf,$ttf,$gn,$hn,$pn,$month,$year,$type,$room_number,$status)
	{       
	$stmt = $this->conn->query("INSERT INTO booktour(name,email,mobileno,residentialaddresss,country,source,destination, depurture,backdate,twayname,tfare, room_fare, pfare, totalfare, gname, hname, pname,month,year,room_type,room_number,status) 
		                                               VALUES('$name', '$email', '$phone', '$address', '$country', '$ts', '$tdd', '$depart',  '$backdate', '$twn', '$tf','$room_fare', '$pf', '$ttf', '$gn','$hn', '$pn','$month','$year','$type','$room_number','$status')") or die(mysqli_error);
	}
public function send($name,$message,$section,$person)
	{
		$stmt = $this->conn->query("INSERT INTO message(name,message,type,person) VALUES('$name', '$message','$section','$person')") or die(mysqli_error());			
	}

		/*** for registration process ***/
		public function account($userpic,$n,$uname,$upass,$umail,$pn,$ra,$c,$co,$section)
		{
			
		$sql = $this->conn->query("INSERT INTO account (userpic, name, username, password, email, phoneno, residentialaddresss, city,country, section)
		VALUES ('$userpic','$n', '$uname', '$upass', '$umail', '$pn','$ra', '$c','$co', '$section')");
		}
		public function reg_admin($username,$password,$firstname,$middlename,$lastname,$section,$email){

			
		$q1 = $this->conn->query("SELECT * FROM `user` WHERE `username` = '$username' or email = '$email'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
		$q3 = $this->conn->query("SELECT * FROM `account` WHERE `username` = '$username' or email = '$email'") or die(mysqli_error());
		$f3 = $q3->fetch_array();
		$c3 = $q3->num_rows;
			if($c1 > 0||$c3>0){
				echo "<script>alert('Username or email already taken')</script>";
			}else{
			
				$this->conn->query("INSERT INTO `user` VALUES('', '$username', '$password', '$firstname', '$middlename', '$lastname', '$section', '$email','','')") or die(mysqli_error());
				//header("location: admin.php");
			}				
		}
		public function reg_dict($English,$Amharic){
		$stmt = $this->conn->query("INSERT INTO dictionary(English,Amharic) 
		                                               VALUES('$English','$Amharic')")or die(mysqli_error());
		}
		public function reg_hotel($hn,$ha,$hc,$hs,$hco,$ht,$hm,$hst,$hair,$hr,$hd,$cn,$cd,$cm,$ce,$novip,$no1st,$nonor,$hstatus,$addroom,$lan,$lng)
		{

	$stmt=$this->conn->query("INSERT into hotel(hname,haddress,city,hstate,hcountry,hteleno,hmobileno,hstar,hairport,hrail,hdescription,cname,cdesignation,cmobileno,cemail,numvip,num1st,numnormal,status,addroom,lat,lng) 
	values('$hn','$ha','$hc','$hs','$hco','$ht','$hm','$hst','$hair','$hr','$hd','$cn','$cd','$cm','$ce','$novip','$no1st','$nonor','$hstatus','$addroom','$lan','$lng')") or die(mysqli_error());
			}
			public function reg_place($s,$d,$vp,$bd,$td,$fd,$bf,$tf,$ff,$bdu,$tdu,$fdu)
			{
			$stmt = $this->conn->query("INSERT INTO place(source,destination,vistingplace, bdistance, tdistance, fdistance, bfare, tfare, ffare, bduration, tduration, fduration) 
		                                               VALUES('$s','$d','$vp','$bd','$td','$fd','$bf','$tf','$ff','$bdu','$tdu','$fdu')") or die(mysqli_error());
			}
			public function package($pn,$pr,$pd)
	{
	$stmt = $this->conn->query("INSERT INTO package(packagename,packagerate,packagedetails) 
		                                               VALUES('$pn','$pr','$pd')")or die(mysqli_error());
													   }
public function reg_guide($gn,$ga,$ge,$gp,$gl,$gey,$ag,$gstatus)
{

	$this->conn->query("INSERT INTO guide VALUES('','$gn', '$ga','$ge', '$gp', '$gl', '$gey', '$ag','$gstatus')") or die(mysqli_error());
				//header("location: admin.php");
			}			
public function reg_user($username,$password,$firstname,$middlename,$lastname,$section,$email){

			
		$q1 = $this->conn->query("SELECT * FROM `user` WHERE `username` = '$username' or email = '$email'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
		$q3 = $this->conn->query("SELECT * FROM `account` WHERE `username` = '$username' or email = '$email'") or die(mysqli_error());
		$f3 = $q3->fetch_array();
		$c3 = $q3->num_rows;
			if($c1 > 0||$c3>0){
				echo "<script>alert('Username or email already taken')</script>";
			}else{
				$this->conn->query("INSERT INTO `user` VALUES('', '$username', '$password', '$firstname', '$middlename', '$lastname', '$section','$email','','')") or die(mysqli_error());
				//header("location: admin.php");
			}				
		}
	public function reg_touser($uname,$umail,$upass,$code)
	{
		$q1 = $this->conn->query("SELECT * FROM `user` WHERE `username` = '$uname' or email = '$umail'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
	
			if($c1 ==1){
				echo "<script>alert('Username or email already taken')</script>";
			}else{
				$this->conn->query("INSERT INTO user(username,password,email,tokenCode) VALUES('$uname', '$upass','$umail','$code')") or die(mysqli_error());
				//header("location: admin.php");
			}
	}

public function update($userpic,$n,$uname,$upass,$umail,$pn,$ra,$c,$co,$id )
	{
			$stmt=$this->conn->query("UPDATE account SET userpic='$userpic', 
		                                                name='$n', 
													   username='$uname', 
													   password='$upass',
													   email='$umail',
													   phoneno='$pn',
													   residentialaddress='$ra',
													   city='$c',
													   country='$co'
													WHERE id='$id'")or die(mysqli_error());
	}
	public function email_exists($uname,$umail) 
{

	$sql = "SELECT id FROM account WHERE username='$uname' or email = '$umail'";

	$result = $this->conn->query($sql) or die(mysqli_error());
	$count=$result->num_rows;
	$stmt = "SELECT user_id FROM user WHERE username='$uname' or email = '$umail'";

	$res = $this->conn->query($stmt) or die(mysqli_error());
	$coun=$res->num_rows;

	if($count == 1||$coun ==1) {
		return true;
	} else {
		return false;
	}
}
public function set_message($message) 
{
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}

public function display_message()
{
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];

		unset($_SESSION['message']);
	}
}
function validation_errors($error_message) 
{
$error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Warning!</strong> $error_message
 </div>
DELIMITER;

$this->set_message($error_message);
}
    	/*** for showing the username or fullname ***/
    	
    	/*** starting the session ***/
	public function logged_in()
	{
	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
		return true;
	} else {
		return false;
	}
}
function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="semagnderese42@gmail.com";  
		$mail->Password="ugesaderese@";            
		$mail->SetFrom('semagnderese42@gmail.com','Ethiopian tour guiding');
		$mail->AddReplyTo("semagnderese42@gmail.com","Ethiopian tour guiding");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}		
public function encrypt($string)
{
$string=str_rot13($string);
$string=strtolower($string);
$string=str_replace('a','1',$string);
$string=str_replace('b','2',$string);
$string=str_replace('c','3',$string);
$string=str_replace('d','4',$string);
$string=str_replace('e','5',$string);
$string=str_replace('f','6',$string);
$string=str_replace('g','7',$string);
$string=str_replace('h','8',$string);
$string=str_replace('i','9',$string);
$string=str_replace('j','0',$string);
$string=str_replace('','s',$string);
 md5($string);
 $string=str_rot13($string);
 $string=str_replace('z','1',$string);
 $string=str_replace('y','2',$string);
 $string=str_replace('x','3',$string);
 $string=str_replace('w','4',$string);
 $string=str_replace('v','5',$string);
 $string=str_replace('u','6',$string);
 $string=str_replace('t','7',$string);
 $string=str_replace('s','8',$string);
 $string=str_replace('r','9',$string);
 $string=str_replace('q','0',$string);
 $string=md5($string);
 $string=str_rot13($string);
 $string=str_replace('a','<',$string);
$string=str_replace('b','>',$string);
$string=str_replace('c',';',$string);
$string=str_replace('m',']',$string);
$string=str_replace('n','[',$string);
$string=str_replace('f','@',$string);
$string=str_replace('c',';',$string);
$string=str_rot13($string);
return $string;
} 

	public function redirect($url)
	{
		header("Location: $url");
	}
	}
?>