<?php 
include"addnewcredit.php";
if(isset($_GET['credit_id'])){
$credit_id=$_GET['credit_id'];
$loan_id=$credit_id;
$p=new Loan();
$credits=$p->getLenderCredit($loan_id);
$i=0;
foreach($credits as $p){
	$lender_id=$p->getLenderId();
	$credit=$p->getLoan();
	$rate=$p->getRate();
	$start_date=$p->getStartDate();
	$comment=$p->getComment();
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
	$days=calculate($now,$start)/86400;
	$sum=$p->getLoan()*$p->getRate()*$days/3000;
	$existcredit=intrest($p->getLoan(),$sum);
}
?>
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="">
<h5><font color="#0080ff">Add credit to existing credit</font></h5>
<div class="form-group">
<label for="lender ID" class="control-label">
Customer ID:</label>
<input type="hidden" class="form-control" name="credit_id" value="<?php echo $loan_id;?>" required>
<input type="text" class="form-control" name="lender_id" value="<?php echo $lender_id;?>" required>
</div>
<div class="form-group">
<label for="credit" class="control-label">
Existing Credit:</label>
<input type="text" class="form-control" name="credit" value="<?php echo $existcredit;?>" required>
</div>
<div class="form-group">
<label for="credit" class="control-label">
Add new Credit:</label>
<input type="text" class="form-control" name="ncredit" placeholder="please insert new credit" required>
</div>
<div class="form-group">
<label for="start date" class="control-label">
Intrest rate:</label>
<input type="text" class="form-control" name="intrest" value="<?php echo $rate;?>" required>
</div>
<div class="form-group">
<label for="start date" class="control-label">
Start date:</label>
<input type="text" class="form-control" name="start_date" placeholder="please insert start date" required>
</div>
<div class="form-group">
<label for="comment" class="control-label">
Comment:</label>
<textarea class="form-control" name="comment" placeholder="new comment" ></textarea>
</div>
</div>
 <div class="form-group">       
 <button type="submit" class="btn btn-default" name="add">Save</button>  
<button type="reset" class="btn btn-default" name="reset">Cancel</button> 
 </div>    
 </div>
 <center>
   <?php 
 if(isset($_POST['add'])){
echo $_SESSION['confirm'];
unset($_SESSION['confirm']);
 }
}
 ?>
 </center>
</form>