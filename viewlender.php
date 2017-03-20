<?php
if(isset($_POST['view'])){
$lend_id=$_POST['lender_id'];
$p=new Profile();
$profiles=$p->getLenderProfile($lend_id);
$i=0;
foreach($profiles as $p){
	echo"<h4><font color='#0080ff'>Customer profiles</font></h4>";
	echo"<center><table bgcolor='white'><tr><td bgcolor='white'>ID:</td><th> ".$p->getLenderId();
	echo"</th></tr><tr><td bgcolor='white'>Names:</td><th>".$p->getName();
	echo"</th></tr><tr><td bgcolor='white'>Gender:</td><th>".$p->getGender();
	echo"</th></tr><tr><td bgcolor='white'>Address:</td><th>".$p->getAddress();
	echo"</th></tr><tr><td bgcolor='white'>Phone:</td><th>".$p->getPhone();
	echo"</th></tr><tr><td bgcolor='white'>Date:</td><th>".$p->getDate()."</th></tr></table></center>";
}
$p=new Loan();
$credits=$p->getLenderCredit($lend_id);
$i=0;
foreach($credits as $p){
	echo"<h4><font color='#0080ff'>credits of customer</font></h4>";
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
	echo"</font></th></tr><tr><td bgcolor='white'>Intrest:</td><th><font color='blue'>".$sum=$p->getLoan()*$p->getRate()*$days/3000;
	echo"</font></th></tr><tr><td bgcolor='white'>Total:</td><th><u><font color='blue'>".intrest($p->getLoan(),$sum);
	echo"</font></u></th></tr><tr><td bgcolor='white'>Date:</td><th>".$p->getDate()."</th></tr></table></center>";
	$_SESSION['intrest']=$sum;
	$_SESSION['total']=intrest($p->getLoan(),$sum);
	$_SESSION['rate']=$p->getRate();
}
}
?>