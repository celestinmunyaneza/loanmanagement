<?php
session_start();
if(isset($_POST['submit'])){
	$password=($_SESSION['password']);
include "db.php";
include "admin.php";
$p=new Admin();
$p->setPassword(md5($_POST['password']));
$p->ChangePassword($password);
header("location:viewprofile.php");	
}
?>