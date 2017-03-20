<?php
session_start();
if(isset($_POST['submit'])){
	$id=$_POST['id'];
include "db.php";
include "admin.php";
$p=new Admin();
$p->setNames($_POST['names']);
$p->setUsername($_POST['uname']);
$p->ChangeProfile($id);
header("location:viewprofile.php");	
}
?>