<?php
session_start();
if(isset($_SESSION['alogin'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "style.php";?>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Are you sure to delete?');
}
</script>
</head>
<body>
<div id="container" class="container">
<div id="header" class="header">
<?php
include "header.php";
//include "addprofile.php";
?>
</div>
<div id="body" class="body">
<div id="left">
<?php include "menu.php";?>
</div>
<div id="content">
<h3><font color="#0000ff">Payment list</font></h3>
<?php
error_reporting(0);
$p=new Payment();
echo "<table border='1'><tr><th>Customer ID</th><th>Loan ID</th><th>Total payment</th><th>Scheduled payment</th><th>Intrest</th><th>Ending balance</th><th>Comment</th><th>Pay date</th><th>Delete</th></tr>";
if($_REQUEST['submit']=="Search"){
	$search=$_REQUEST["search"];
$payments=$p->getSearchPayments($search);
}else{
	$payments=$p->getpayments();
}

foreach($payments as $p){
	$total +=$p->getpayment();
	$payment +=$p->getScheduledPayment();
	$intrest +=$p->getIntrest();
	$balance +=$p->getEndBalance();
	echo"<tr><td><a href='viewpayment.php?lend_id=".$p->getLenderId()."'title='Click to view lender profiles'>".$p->getLenderId()."</a></td><td><a href='viewpayment.php?credit_id=".$p->getLoanId()."'title='click to view lender credits'>".$p->getLoanId()."</a></td><td>".$p->getPayment()."</td><td>".$p->getScheduledPayment()."</td><td>".$p->getIntrest()."</td><td>".$p->getEndBalance()."</td><td>".$p->getComment()."</td><td>".$p->getPayDate()."</td><td><a href='deletepayment.php?id=".$p->getId()."'title='Delete this field'onclick='return confirm_delete();'><image src='images/delete.png'width='30px'></a></td></tr>";
}	
echo "<tr><th>total</th><th></th><th>".$total."</th><th>".$payment."</th><th>".$intrest."</th><th>".$balance."</th><th></th><th></th><th></th></tr></table>";
?>
<br><br><br><br><br><br><br>
</div>
<div id="right">
<?php
if(isset($_GET['credit_id'])){
	$credit_id=$_GET['credit_id'];
$p=new Loan();
$credits=$p->getLenderLoan($credit_id);
$i=0;
foreach($credits as $p){
	echo"<h4>Lender credits</h4>";
	echo"<center><table bgcolor='white'><tr><td bgcolor='white'>Credit ID:</td><th> ".$p->getLoanId();
	echo"</th></tr><tr><td bgcolor='white'>Credit:</td><th>".$p->getLoan();
	echo"</th></tr><tr><td bgcolor='white'>Intrest Rate:</td><th>".$p->getRate();
	echo"</th></tr><tr><td bgcolor='white'>Start date:</td><th>".$p->getStartDate();
	function calculate($x,$y){
		$result=$x-$y;
		return $result;
	}
	$now=strtotime("now");
	$start=strtotime($p->getStartDate());
	$res=calculate($now,$start);
	function intrest($x,$y){
		$intrest=$x+$y;
		return $intrest;
	}
	echo"</th></tr><tr><td bgcolor='white'>Days:</td><th><font color='blue'>".$days=calculate($now,$start)/86400;
	echo"</font></th></tr><tr><td bgcolor='white'>Intrest:</td><th><font color='blue'>".$sum=$p->getLoan()*$p->getRate()*$days/100;
	echo"</font></th></tr><tr><td bgcolor='white'>Total:</td><th><u><font color='blue'>".intrest($p->getLoan(),$sum);
	echo"</font></u></th></tr><tr><td bgcolor='white'>Date:</td><th>".$p->getDate()."</th></tr></table></center>";
	$_SESSION['intrest']=$sum;
	$_SESSION['total']=intrest($p->getLoan(),$sum);
}
}
if(isset($_GET['lend_id'])){
$lend_id=$_GET['lend_id'];
$p=new Profile();
$profiles=$p->getLenderProfile($lend_id);
$i=0;
foreach($profiles as $p){
	echo"<h4>Lender profiles</h4>";
	echo"<center><table bgcolor='white'><tr><td bgcolor='white'>ID:</td><th> ".$p->getLenderId();
	echo"</th></tr><tr><td bgcolor='white'>Names:</td><th>".$p->getName();
	echo"</th></tr><tr><td bgcolor='white'>Gender:</td><th>".$p->getGender();
	echo"</th></tr><tr><td bgcolor='white'>Address:</td><th>".$p->getAddress();
	echo"</th></tr><tr><td bgcolor='white'>Phone:</td><th>".$p->getPhone();
	echo"</th></tr><tr><td bgcolor='white'>Date:</td><th>".$p->getDate()."</th></tr></table></center>";
}
}

?>
</div>
</div>
<div id="footer" class="footer">
<?php
include "footer.php";
?>
</div>
</div>
</body>
</html>
<?php
}else{
	header("location:index.php");
}
?>