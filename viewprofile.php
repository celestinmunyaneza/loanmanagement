<?php 
session_start();
if(!isset($_SESSION['alogin'])){
	header("location:index.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "style.php";
?>
</head>
<body>
<div id="container"class="container">
<div id="header">
<?php
include "header.php";
?>
</div>
<div id="body">
<div id="left">
<?php include "menu.php";?>
</div>
<div id="content">
<center>
<h3>Profile</h3>
<?php
include "admin.php";
$username=$_SESSION["alogin"];
$p=new Admin();
$profile=$p->getProfile($username);
if($profile){
	$sno = 0;
    foreach ($profile as $p) {
	$sno ++;
	echo "<image src='admin/".$p->getPicture()."'width='30%'><p>";
	echo "Your names: <b>".$p->getNames()."</b><br>";
	echo "Your username: <b>".$p->getUsername()."</b><br>";
	echo "<a href='changeprofile_form.php?id=".$p->getId()."'>Change profile</a></p>";
	}
}
?>
</center>
</div>
<div id="right">
</div>
</div>
<div id="footer">
<?php
include "footer.php";
?>
</div>
</div>
</body>
</html>
<?php
}
?>