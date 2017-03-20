<?php 
include 'db.php';
include 'loan.php';

$id = $_GET['id'];

$p = new Loan();

$p->deleteCreditDetail($id);

header ('Location: viewcreditdetail.php');

?>