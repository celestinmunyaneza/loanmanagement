<?php
//include "loan.php";
if(isset($_POST['update'])){
$p=new Profile();
$p->setName(trim($_POST['lender_name']));
$p->setGender(trim($_POST['gender']));
$p->setAddress(trim($_POST['address']));
$p->setPhone(trim($_POST['phone']));
$p->updateProfile();	
}
?>