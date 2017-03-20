<?php
//include "loan.php";
if(isset($_POST['add'])){
	$loan_id=$_POST['credit_id'];
	function add($x,$y){
		$total=$x+$y;
		return $total;
	}
$p=new Loan();
$p->setLenderId(trim($_POST['lender_id']));
$p->setLoan(trim(add($_POST['credit'],$_POST['ncredit'])));
$p->setRate(trim($_POST['intrest']));
$p->setStartDate(trim($_POST['start_date']));
$p->setComment(trim($_POST['comment']));
$p->updateCredits($loan_id);
$p->addCredit();
header("location:viewcredit.php");	
}
?>