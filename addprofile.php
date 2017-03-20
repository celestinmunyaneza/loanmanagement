<?php
//include "loan.php";
if(isset($_POST['profile'])){
$p=new Profile();
$p->setName(trim($_POST['lender_name']));
$p->setGender(trim($_POST['gender']));
$p->setAddress(trim($_POST['address']));
$p->setPhone(trim($_POST['phone']));
$p->addProfile();	
header("location:credit_form.php");
}
?>