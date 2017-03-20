<?php 
include 'db.php';
include 'loan.php';

$id = $_GET['id'];

$p = new Payment();

$p->deletePayment($id);

header ('Location: viewpayment.php');

?>