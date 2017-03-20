
<p><font color="#0000ff">Menu</font></p>
<a href="profile_form.php">Complete customer profile<img src="images/image-slider-3.jpg"width="100%"alt="Complete customer profile"></a><br>
<a href="credit_form.php">Give credit of customer<img src="images/image-slider-5.jpg"width="100%"></a><br>
<a href="payment_form.php">Loan payment<img src="images/addpay.png"width="100%"></a>
<form method="POST"class="form-control"action="">
<div class="form-group">
<br>
<label for="lender ID" class="col-sm-2 control-label">
Customer ID:</label>
<div class="col-sm-10">
<select method="POST"name="lender_id">
<option selected disabled>--select customer ID--</option>
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
<div class="col-sm-offset-2 col-sm-10">          
<button type="submit" class="btn btn-default" name="view">View</button>   
 </div>    
 </div>
</form>