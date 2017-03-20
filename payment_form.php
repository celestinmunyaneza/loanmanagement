<?php
session_start();
if(isset($_SESSION['alogin'])){

?>
<!DOCTYPE html>
<html>
<head>
<?php include "style.php";?>
</head>
<body>
<div id="container" class="container">
<div id="header" class="header">
<?php
include "header.php";
include "addpayment.php";
?>
</div>
<div id="body" class="body">
<div id="left" class="left">
<?php include "menu.php";?>
</div>
<div id="content"class="content">
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
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="">
<h3><font color="#0080ff">Payment of loan </font></h3>
<div class="form-group">
<label for="lender ID" class="col-sm-2 control-label">
Customer ID:</label>
<div class="col-sm-10">
<select method="POST"name="lend_id"class="form-control"required>
<option selected disabled>--select Customer ID--</option>
<?php
$p=new Profile();
$profiles=$p->getLenderProfiles();
$i=0;
foreach($profiles as $p){
	echo"<option>".$p->getLenderId()."</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label for="loan id" class="col-sm-2 control-label">
Credit ID</label>
<div class="col-sm-10">
<select method="POST"name="credit_id"class="form-control"required>
<option selected disabled>--select Credit ID--</option>
<?php
$p=new Loan();
$credits=$p->getLenderCredits();
$i=0;
foreach($credits as $p){
	echo"<option>".$p->getLoanId()."</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label for="credit" class="col-sm-2 control-label">
payment amount:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="scheduled" placeholder="Enter the amount of payment" required>
</div>
</div>
<div class="form-group">
<label for="start date" class="col-sm-2 control-label">
Payment date:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="paydate" placeholder="yyyy-mm-dd" required>
</div>
</div>
<div class="form-group">
<label for="comment" class="col-sm-2 control-label">
Comment:</label>
<div class="col-sm-10">
<textarea class="form-control" name="comment" placeholder="Enter message" ></textarea>
</div>
</div>
 <div class="form-group">       
 <div class="col-sm-offset-2 col-sm-10">          
 <button type="submit" class="btn btn-default" name="paid">Save</button>  
<button type="reset" class="btn btn-default" name="reset">Cancel</button> 
 </div>    
 </div>
 <center>
   <?php 
 if(isset($_POST['paid'])){
echo $_SESSION['confirm'];
unset($_SESSION['confirm']);
 }
 ?>
 </center>
</form>
<?php
}
?>
<br><br><br><br><br><br><br>
</div>
<div id="right">
<?php 
if(isset($_POST['paid'])){
	echo "<center>".$_SESSION['newcredit']."</center>";
	unset($_SESSION['newcredit']);
}
include "viewlender.php";
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