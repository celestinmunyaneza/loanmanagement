<?php
class Profile{
	private $lender_id;
	private $name;
	private $gender;
	private $address;
	private $phone;
	private $date;
public function setLenderId($lender_id){
	$this->lender_id=$lender_id;
}
public function getLenderId(){
	return $this->lender_id;
}
public function setName($name){
	$this->name=$name;
}
public function getName(){
	return $this->name;
}
public function setGender($gender){
	$this->gender=$gender;
}
public function getGender(){
	return $this->gender;
}
public function setAddress($address){
	$this->address=$address;
}
public function getAddress(){
	return $this->address;
}
public function setPhone($phone){
	$this->phone=$phone;
}
public function getPhone(){
	return $this->phone;
}
public function setDate($date){
	$this->date=$date;
}
public function getDate(){
	return $this->date;
}
public function addProfile(){
	db::connect();
	$query="insert into lender_profile (lend_names,gender,address,phone) values('".mysql_real_escape_string($this->name)."','$this->gender','$this->address','$this->phone')";
	mysql_query($query)or die(mysql_error());
	$_SESSION['confirm']="<font color='green'>Registration Successifuly";
}
public function getLenderProfiles(){
	db::connect();
	$query="select * from lender_profile order by reg_date desc";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$profiles=array();
	while($row=mysql_fetch_array($res)){
		$p=new Profile();
		$p->setLenderId($row['lend_id']);
		$p->setName($row['lend_names']);
		$p->setGender($row['gender']);
		$p->setAddress($row['address']);
		$p->setPhone($row['phone']);
		$p->setDate($row['reg_date']);
		$profiles[$i]=$p;
		$i++;
	}
	return $profiles;
}
public function getLenderProfile($lender_id){
	db::connect();
	$query="select * from lender_profile where lend_id='".$lender_id."'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$profiles=array();
	while($row=mysql_fetch_array($res)){
		$p=new Profile();
		$p->setLenderId($row['lend_id']);
		$p->setName($row['lend_names']);
		$p->setGender($row['gender']);
		$p->setAddress($row['address']);
		$p->setPhone($row['phone']);
		$p->setDate($row['reg_date']);
		$profiles[$i]=$p;
		$i++;
	}
	return $profiles;
}
public function updateProfile(){
	db::connect();
	$query="update lender_profile set lend_names='".mysql_real_escape_string($this->name)."',gender='$this->gender',address='$this->address',phone='$this->phone'";
	mysql_query($query)or die(mysql_error());
	$_SESSION['confirm']="<font color='green'>Request Successifuly";
}
public function deleteProfile($id){
db::connect();
$query="delete from lender_profile where lend_id='$id'";
mysql_query($query)or die("Sorry delete historical of this lender before delete on him");
}
public function getSearchProfiles($search){
	db::connect();
	$query="select * from lender_profile where lend_id like '%$search%' or lend_names like '%$search%' or gender like '%$search%' or address like '%$search%'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$profiles=array();
	while($row=mysql_fetch_array($res)){
		$p=new Profile();
		$p->setLenderId($row['lend_id']);
		$p->setName($row['lend_names']);
		$p->setGender($row['gender']);
		$p->setAddress($row['address']);
		$p->setPhone($row['phone']);
		$p->setDate($row['reg_date']);
		$profiles[$i]=$p;
		$i++;
	}
	return $profiles;
}
}
class Loan{
	private $loan_id;
	private $lender_id;
	private $loan;
	private $rate;
	private $starte_date;
	private $comment;
	private $date;
public function setLoanId($loan_id){
	$this->loan_id=$loan_id;
}
public function getLoanId(){
	return $this->loan_id;
}
public function setLenderId($lender_id){
	$this->lender_id=$lender_id;
}
public function getLenderId(){
	return $this->lender_id;
}
public function setLoan($loan){
	$this->loan=$loan;
}
public function getLoan(){
	return $this->loan;
}
public function setRate($rate){
	$this->rate=$rate;
}
public function getRate(){
	return $this->rate;
}
public function setStartDate($start_date){
	$this->start_date=$start_date;
}
public function getStartDate(){
	return $this->start_date;
}
public function setComment($comment){
	$this->comment=$comment;
}
public function getComment(){
	return $this->comment;
}
public function setDate($date){
	$this->date=$date;
}
public function getDate(){
	return $this->date;
}
public function addLoan(){
	db::connect();
	$check=mysql_query("select * from lender_profile where lend_id='$this->lender_id'")or die(mysql_error());
	if(mysql_num_rows($check)>=1){
	$query="insert into lender_list (lend_id,loan_amount,intrest_rate,start_date,comment) values('$this->lender_id','$this->loan','$this->rate','$this->start_date','$this->comment')";
	mysql_query($query)or die(mysql_error());
	$_SESSION["confirm"]="<font color='green'>The request complete successifuly";
	}else{
		$_SESSION["confirm"]="<font color='red'>Please complete lender profile first!!!</font>";
	}
}
public function getLenderCredits(){
	db::connect();
	$query="select * from lender_list";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function getLenderCredit($lender_id){
	db::connect();
	$query="select * from lender_list where lend_id='$lender_id'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function updateCredit($credit_id){
	$query="update lender_list set loan_amount='$this->loan',start_date='$this->start_date',comment='$this->comment' where loan_id='$credit_id'";
	mysql_query($query)or die(mysql_error());
	$_SESSION["newcredit"]="<font color='green'><b>New credit is ".$this->loan."</b></font>";
}
public function updateCredits($loan_id){
	db::connect();
	$check=mysql_query("select * from lender_profile where lend_id='$this->lender_id'")or die(mysql_error());
	if(mysql_num_rows($check)>=1){
	$query="update lender_list set lend_id='$this->lender_id',loan_amount='$this->loan',intrest_rate='$this->rate',start_date='$this->start_date',comment='$this->comment'where loan_id='$loan_id'";
	mysql_query($query)or die(mysql_error());
	$_SESSION["confirm"]="<font color='green'>The request complete successifuly";
	}else{
		$_SESSION["confirm"]="<font color='red'>Please complete lender profile first!!!</font>";
	}
}
public function getLenderLoan($credit_id){
	db::connect();
	$query="select * from lender_list where loan_id='$credit_id'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function deleteCredit($id){
db::connect();
$query="delete from lender_list where loan_id='$id'";
mysql_query($query)or die(mysql_error());
}
public function addCredit(){
	db::connect();
	$check=mysql_query("select * from lender_profile where lend_id='$this->lender_id'")or die(mysql_error());
	if(mysql_num_rows($check)>=1){
	$query="insert into credit_detail (lend_id,loan_amount,intrest_rate,start_date,comment) values('$this->lender_id','$this->loan','$this->rate','$this->start_date','$this->comment')";
	mysql_query($query)or die(mysql_error());
	
	}
}
public function getCredits(){
	db::connect();
	$query="select * from credit_detail";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function getCredit($lender_id){
	db::connect();
	$query="select * from credit_detail where lend_id='$lender_id'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function deleteCreditDetail($id){
db::connect();
$query="delete from credit_detail where loan_id='$id'";
mysql_query($query)or die(mysql_error());
}
public function getSearchCredits($search){
	db::connect();
	$query="select * from lender_list where lend_id like'$search' or comment like'$search'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
public function getSearchCreditDetails($search){
	db::connect();
	$query="select * from credit_detail where lend_id like'$search' or comment like'$search'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$credits=array();
	while($row=mysql_fetch_array($res)){
		$p=new Loan();
		$p->setLoanId($row['loan_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoan($row['loan_amount']);
		$p->setRate($row['intrest_rate']);
		$p->setStartDate($row['start_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$credits[$i]=$p;
		$i++;
	}
	return $credits;
}
}
class Payment{
	private $id;
	private $lender_id;
	private $loan_id;
	private $credit;
	private $start_date;
	private $payment;
    private $intrest;
    private $scheduled_payment;
    private $endbalance;
    private $pay_date;
    private $comment;
    private $date;
public function setId($id){
	$this->id=$id;
}
public function getId(){
	return $this->id;
}
public function setLenderId($lender_id){
	$this->lender_id=$lender_id;
}
public function getLenderId(){
	return $this->lender_id;
}
public function setLoanId($loan_id){
	$this->loan_id=$loan_id;
}
public function getLoanId(){
	return $this->loan_id;
}
public function setCredit($credit){
	$this->credit=$credit;
}
public function getCredit(){
	return $this->credit;
}
public function setStartDate($start_date){
	$this->start_date=$start_date;
}
public function getStartDate(){
	return $this->start_date;
}
public function setPayment($payment){
	$this->payment=$payment;
}
public function getPayment(){
	return $this->payment;
}
public function setIntrest($intrest){
	$this->intrest=$intrest;
}
public function getIntrest(){
	return $this->intrest;
}
public function setScheduledPayment($scheduled_payment){
	$this->scheduled_payment=$scheduled_payment;
}
public function getScheduledPayment(){
	return $this->scheduled_payment;
}
public function setEndBalance($endbalance){
	$this->endbalance=$endbalance;
}
public function getEndBalance(){
	return $this->endbalance;
}
public function setPayDate($pay_date){
	$this->pay_date=$pay_date;
}
public function getPayDate(){
	return $this->pay_date;
}
public function setComment($comment){
	$this->comment=$comment;
}
public function getComment(){
	return $this->comment;
}
public function setDate($date){
	$this->date=$date;
}
public function getDate(){
	return $this->date;
}
public function addPayment(){
	db::connect();
	$check=mysql_query("select * from lender_profile where lend_id='$this->lender_id'")or die(mysql_error());
	if(mysql_num_rows($check)>=1){
	$query="insert into payment_list(lend_id,loan_id,loan_amount,start_date,total_payment,intrest,scheduled_payment,ending_balance,pay_date,comment) values('$this->lender_id',
	'$this->loan_id','$this->credit','$this->start_date','$this->payment','$this->intrest','$this->scheduled_payment','$this->endbalance','$this->pay_date','$this->comment')";
	mysql_query($query);
	$_SESSION["confirm"]="<font color='green'>The request complete successifuly";
	}else{
		$_SESSION["confirm"]="<font color='red'>Please complete lender profile first!!!</font>";
	}
}
public function getPayments(){
	db::connect();
	$query="select * from payment_list";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$payments=array();
	while($row=mysql_fetch_array($res)){
		$p=new Payment();
		$p->setId($row['pay_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoanId($row['loan_id']);
		$p->setCredit($row['loan_amount']);
		$p->setStartDate($row['start_date']);
		$p->setPayment($row['total_payment']);
		$p->setIntrest($row['intrest']);
		$p->setScheduledPayment($row['scheduled_payment']);
		$p->setEndBalance($row['ending_balance']);
		$p->setPayDate($row['pay_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$payments[$i]=$p;
		$i++;
	}
	return $payments;
}
public function deletePayment($id){
db::connect();
$query="delete from payment_list where pay_id='$id'";
mysql_query($query)or die(mysql_error());
}
public function getSearchPayments($search){
	db::connect();
	$query="select * from payment_list where lend_id like '%$search%' or comment like '%$search%'";
	$res=mysql_query($query)or die(mysql_error());
	$i=0;
	$payments=array();
	while($row=mysql_fetch_array($res)){
		$p=new Payment();
		$p->setId($row['pay_id']);
		$p->setLenderId($row['lend_id']);
		$p->setLoanId($row['loan_id']);
		$p->setCredit($row['loan_amount']);
		$p->setStartDate($row['start_date']);
		$p->setPayment($row['total_payment']);
		$p->setIntrest($row['intrest']);
		$p->setScheduledPayment($row['scheduled_payment']);
		$p->setEndBalance($row['ending_balance']);
		$p->setPayDate($row['pay_date']);
		$p->setComment($row['comment']);
		$p->setDate($row['reg_date']);
		$payments[$i]=$p;
		$i++;
	}
	return $payments;
}
}
?>