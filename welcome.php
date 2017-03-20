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
<?php
error_reporting(0);
if($_REQUEST['submit']=="Search"){
	$search=$_REQUEST["search"];
	$p=new Profile();
	$profiles=$p->getSearchProfiles($search);
foreach($profiles as $p){
	echo"<h4><font color='#0000ff'>Customer profiles</font></h4>";
	echo"<center><table bgcolor='white'><tr><td bgcolor='white'>ID:</td><th> ".$p->getLenderId();
	echo"</th></tr><tr><td bgcolor='white'>Names:</td><th>".$p->getName();
	echo"</th></tr><tr><td bgcolor='white'>Gender:</td><th>".$p->getGender();
	echo"</th></tr><tr><td bgcolor='white'>Address:</td><th>".$p->getAddress();
	echo"</th></tr><tr><td bgcolor='white'>Phone:</td><th>".$p->getPhone();
	echo"</th></tr><tr><td bgcolor='white'>Registration Date: </td><th>&nbsp;".$p->getDate()."</th></tr></table></center>";
}
$p=new Loan();
echo "<h5><font color='#0000ff'>Credit detail</font></h5>";
echo "<table border='1'><tr><th>No</th><th>Credit</th><th>Intrest rate</th><th>Start date</th><th>Comment</th><th>registration Date</th><th>Delete</th></tr>";
$credits=$p->getSearchCreditDetails($search);
$i=1;
foreach($credits as $p){
	$credit +=$p->getLoan();
	echo"<tr><td>".$i."</td><td>".$p->getLoan()."</td><td>".$p->getRate()."</td><td>".$p->getStartDate()."</td><td>".$p->getComment()."</td><td>".$p->getDate()."</td>
	<td><a href='deletecreditdetail.php?id=".$p->getLoanId()."'title='Delete this field'onclick='return confirm_delete();'><image src='images/delete.png'width='30px'></a></td></tr>";
	$i++;
}
echo "<tr><th>Total</th><th>".$credit."</th><th colspan='5'></th></tr></table>";
$p=new Payment();
echo"<h5><font color='#0000ff'>Payment detail</font></h5>";
echo "<table border='1'><tr><th>Credit ID</th><th>Total payment</th><th>Scheduled payment</th><th>Intrest</th><th>Ending balance</th><th>Comment</th><th>Pay date</th><th>Delete</th></tr>";

$payments=$p->getSearchPayments($search);
foreach($payments as $p){
	$total +=$p->getpayment();
	$payment +=$p->getScheduledPayment();
	$intrest +=$p->getIntrest();
	$balance +=$p->getEndBalance();
	echo"<tr><td><a href='viewpayment.php?credit_id=".$p->getLoanId()."'title='click to view lender credits'>".$p->getLoanId()."</a></td><td>".$p->getPayment()."</td><td>".$p->getScheduledPayment()."</td><td>".$p->getIntrest()."</td><td>".$p->getEndBalance()."</td><td>".$p->getComment()."</td><td>".$p->getPayDate()."</td><td><a href='deletepayment.php?id=".$p->getId()."'title='Delete this field'onclick='return confirm_delete();'><image src='images/delete.png'width='30px'></a></td></tr>";
}	
echo "<tr><th>total</th><th>".$total."</th><th>".$payment."</th><th>".$intrest."</th><th>".$balance."</th><th></th><th></th><th></th></tr></table>";
$p=new Loan();
$credits=$p->getSearchCredits($search);
foreach($credits as $p){
	echo "<p>New credit is <b>".$p->getLoan()."</b></p>";
}
}else{
?>
<div class="thumbnail">
    <div id="sliderFrame">
        <div id="slider">
		
	<!-- 	Append this section to change the images -->
            
            <img src="images/homepage.jpg" alt="welcome to Loan Management System." />
            <img src="images/addpay1.png" alt="Ask credit you need to use." />
           
    </div>
</div>
</div>
<?php
}
?>
</div>
<div id="right">
<?php include "viewlender.php";?>
<p>
Loan Management System is a system that help you to manage your loan.</p><p> It shows you the time for credit and it is also calculate the amount of money after any time you want 
to pay it.</p><p>The system save all historicals between customer and lender until the system manager remove that history.
</p>
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