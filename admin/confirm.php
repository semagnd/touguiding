<?php
require_once('class.php');
$user=new user();
if(isset($_GET['id']))
{
$id=$_GET['id'];
$type="tourist";
$stmt=$user->runQuery("update account set section='$type' where id='$id'") or die(mysqli_error());
if($stmt==true)
{
$sql=$user->runQuery("INSERT INTO user(username,email,password,section) SELECT username,email,password,section from account where username='$id'") or die(mysqli_error());
$stmt=$user->runQuery("update message set status='confirm' where name='$id'") or die(mysqli_error());
$user->redirect("message.php");
}
}
?>