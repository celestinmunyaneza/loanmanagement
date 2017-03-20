<?php
if(isset($_POST['submit'])){
include "db.php";
include "admin.php";
$p=new Admin();
$p->setNames($_POST['names']);
$p->setUsername($_POST['username']);
$p->setPassword(md5($_POST['password']));
$p->AddAdmin();
header("location:user_form.php");	
}
?>