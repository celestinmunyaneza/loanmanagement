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
<h3><font color="#0000ff">Credits Detail</font></h3>
<?php
error_reporting(0);
$p=new Loan();
echo "<table border='1'><tr><th>No</th><th>Customer ID</th><th>Credit</th><th>Intrest rate</th><th>Start date</th><th>Comment</th><th>registration Date</th><th>Delete</th></tr>";
$credits=$p->getCredits();
if($_REQUEST['submit']=="Search"){
	$search=$_REQUEST["search"];
$credits=$p->getSearchCreditDetails($search);
}
$i=1;
foreach($credits as $p){
	$credit +=$p->getLoan();
	echo"<tr><td>".$i."</td><td><a href='viewcredit.php?lend_id=".$p->getLenderId()."'title='click to view customer profiles'>".$p->getLenderId()."</td><td>".$p->getLoan()."</td><td>".$p->getRate()."</td><td>".$p->getStartDate()."</td><td>".$p->getComment()."</td><td>".$p->getDate()."</td>
	<td><a href='deletecreditdetail.php?id=".$p->getLoanId()."'title='Delete this field'onclick='return confirm_delete();'><image src='images/delete.png'width='30px'></a></td></tr>";
	$i++;
}	
echo "<tr><th colspan='2'>Total</th><th>".$credit."</th><th colspan='5'></th></tr></table>";
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
	echo"<h4>Customer profiles</h4>";
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