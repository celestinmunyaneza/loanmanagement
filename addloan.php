<?php
//include "loan.php";
if(isset($_POST['addcredit'])){
$p=new Loan();
$p->setLenderId(trim($_POST['lender_id']));
$p->setLoan(trim($_POST['credit']));
$p->setRate(trim($_POST['intrest']));
$p->setStartDate(trim($_POST['start_date']));
$p->setComment(trim($_POST['comment']));
$p->addLoan();
$p->addCredit();	
}
?>