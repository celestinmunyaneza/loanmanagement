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
?>
</div>
<div id="body" class="body">
<div id="left">
<?php include "menu.php";?>
</div>
<div id="content">
<h3><font color="#0000ff">List of no payment for credits</font></h3>
<?php
error_reporting(0);
$p=new Loan();
echo "<table border='1'><tr><th>No</th><th>Credit ID</th><th>Customer ID</th><th>Credit</th><th>Intrest rate</th><th>Start date</th><th>Days</th><th>Intrest</th><th>Total</th><th>Comment</th><th>registration Date</th></tr>";
$credits=$p->getLenderCredits();
if($_REQUEST['submit']=="Search"){
	$search=$_REQUEST["search"];
$credits=$p->getSearchCredits($search);
}
$i=1;
function calculate($x,$y){
		$result=$x-$y;
		return $result;
	}
function intrest($x,$y){
		$intrest=$x+$y;
		return $intrest;
	}
foreach($credits as $p){
	
	$now=strtotime("now");
	$start=strtotime($p->getStartDate());
	$res=calculate($now,$start);
	$days=calculate($now,$start)/86400;
	$sum=$p->getLoan()*$p->getRate()*$days/3000;
	$credit +=$p->getLoan();
	$intrest +=$sum;
	$total +=intrest($p->getLoan(),$sum);
	echo"<tr><td>".$i."</td><td>".$p->getLoanId()."</td><td><a href='viewnopayment.php?lend_id=".$p->getLenderId()."'title='click to view customer profiles'>".$p->getLenderId()."</td><td>".$p->getLoan()."</td><td>".$p->getRate()."</td><td>".$p->getStartDate()."</td><td>".$days."</td><td>".$sum."</td><td>".intrest($p->getLoan(),$sum)."</td><td>".$p->getComment()."</td><td>".$p->getDate()."</td></tr>";
	$i++;
}
    echo"<tr><th>total</th><th></th><th></th><th>".$credit."</th><th></th><th></th><th></th><th>".$intrest."</th><th>".$total."</th><th></th></tr>";	
echo "</table>";
?>
<br><br><br><br><br><br><br>
</div>
<div id="right">
<?php
if(isset($_GET['lend_id'])){
$lend_id=$_GET['lend_id'];
$p=new Profile();
$profiles=$p->getLenderProfile($lend_id);
$i=0;
foreach($profiles as $p){
	echo"<h4><font color='#0000ff'>Customer profiles</font></h4>";
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