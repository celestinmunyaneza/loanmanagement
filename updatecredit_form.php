<?php 
include"updatecredit.php";
if(isset($_GET['loan_id'])){
$loan_id=$_GET['loan_id'];
$p=new Loan();
$credits=$p->getLenderCredit($loan_id);
$i=0;
foreach($credits as $p){
	$lender_id=$p->getLenderId();
	$credit=$p->getLoan();
	$rate=$p->getRate();
	$start_date=$p->getStartDate();
	$comment=$p->getComment();
}
?>
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="">
<h3><font color="#0080ff">Edit credit</font></h3>
<div class="form-group">
<label for="lender ID" class="control-label">
Customer ID:</label>
<input type="hidden" class="form-control" name="credit_id" value="<?php echo $loan_id;?>" required>
<select method="POST"name="lender_id"class="form-control"required>
<option selected><?php echo $lender_id;?></option>
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
<div class="form-group">
<label for="credit" class="control-label">
Credit:</label>
<input type="text" class="form-control" name="credit" value="<?php echo $credit;?>" required>
</div>
<div class="form-group">
<label for="start date" class="control-label">
Intrest rate:</label>
<input type="text" class="form-control" name="intrest" value="<?php echo $rate;?>" required>
</div>
<div class="form-group">
<label for="start date" class="control-label">
Start date:</label>
<input type="text" class="form-control" name="start_date" value="<?php echo $start_date?>" required>
</div>
<div class="form-group">
<label for="comment" class="control-label">
Comment:</label>
<textarea class="form-control" name="comment" value="<?php echo $comment;?>" ></textarea>
</div>
 <div class="form-group">                
 <button type="submit" class="btn btn-default" name="update">Save</button>  
<button type="reset" class="btn btn-default" name="reset">Cancel</button>     
 </div>
 <center>
   <?php 
 if(isset($_POST['update'])){
echo $_SESSION['confirm'];
unset($_SESSION['confirm']);
 }
}
 ?>
 </center>
</form>