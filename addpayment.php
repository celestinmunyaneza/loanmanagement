<?php
//include "loan.php";
if(isset($_POST['paid'])){
	$p=new Loan();
	$lend_id=trim($_POST['lend_id']);
	$paydate=trim($_POST['paydate']);
$credits=$p->getLenderCredit($lend_id);
$i=0;
function calculate($x,$y){
		$result=$x-$y;
		return $result;
	}
	function intrest($x,$y){
		$intrest=$x+$y;
		return $intrest;
	}
foreach($credits as $p){
	$p->getLoanId();
	$p->getLoan();
	$p->getRate();
	$p->getStartDate();
	
	$now=strtotime($paydate);
	$start=strtotime($p->getStartDate());
	$res=calculate($now,$start);

	$days=calculate($now,$start)/86400;
	$sum=$p->getLoan()*$p->getRate()*$days/3000;
	intrest($p->getLoan(),$sum);
	$total=intrest($p->getLoan(),$sum);
	$rate=$p->getRate();
}
	$scheduled=trim($_POST['scheduled']);
	$credit_id=trim($_POST['credit_id']);
	
	$comment=trim($_POST['comment']);
$p=new Payment();
$p->setLenderId($lend_id);
$p->setLoanId($credit_id);
$p->setPayment($total);
$p->setIntrest(trim($sum));
$p->setScheduledPayment($scheduled);
function balance($x,$y){
	$result=$x-$y;
	return $result;
}
$balance=balance($total,$scheduled);
$p->setPayDate($paydate);
$p->setEndBalance($balance);	
$p->setComment($comment);
$p->addPayment();
if($balance>=100){
	$p=new Loan();
	$p->setLenderId($lend_id);
	$p->setLoan($balance);
	$p->setRate(trim($rate));
	$p->setStartDate($paydate);
	$p->setComment($comment);
	$p->updateCredit($credit_id);
	$p->addCredit();
}else{
	$p=new Loan();
	$p->setStartDate($paydate);
	$p->setComment($comment);
	$p->updateCredit($credit_id);
}
}
?>