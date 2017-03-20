<?php 
include 'db.php';
include 'loan.php';

$id = $_GET['id'];

$p = new Loan();

$p->deleteCredit($id);

header ('Location: viewcredit.php');

?>