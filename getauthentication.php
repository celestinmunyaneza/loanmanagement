<?php
session_start();
error_reporting(0);
$msg="";
if(isset($_POST['submit'])){
include "db.php";
include "admin.php";

$uname=$_POST['username'];
$pass=md5($_POST['password']);
$p=new Admin();
$admins=$p->getAuthentication($uname,$pass);
foreach($admins as $p){
	$names=$p->getNames();
	$username=$p->getUsername();
	$password=$p->getPassword();
	$picture=$p->getPicture();
	if($username==$uname && $password==$pass){
		$_SESSION['alogin']=$username;
		$_SESSION['password']=$password;
		$_SESSION['uname']=$names;
		$_SESSION['picture']=$picture;
	}
}
}
if(isset($_SESSION['alogin'])){
	header("location:welcome.php");	
	}else{
		$msg="<p><font color='red'><strong>Failed to login...</strong></font></p>";
	}
?>