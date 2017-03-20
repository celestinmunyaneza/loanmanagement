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
<h3><font color="#0000ff">Customer profiles list</font></h3>
<center>
<?php
error_reporting(0);
$p=new Profile();
$profiles=$p->getLenderProfiles();
if($_REQUEST['submit']=="Search"){
	$search=$_REQUEST["search"];
$profiles=$p->getSearchProfiles($search);
}
echo "<table border='1'><tr><th>No</th><th>Customer ID</th><th>Customer names</th><th>Gender</th><th>Address</th><th>Phone</th><th>registration Date</th><th>Edit</th><th>Delete</th></tr>";

$i=1;
foreach($profiles as $p){
	
	echo"<tr><td>".$i."</td><td>".$p->getLenderId()."</td><td>".$p->getName()."</td><td>".$p->getGender()."</td><td>".$p->getAddress()."</td><td>".$p->getPhone()."</td><td>".$p->getDate()."</td><td><a href='viewprofiles.php?lender_id=".$p->getLenderId()."'title='Edit this field'><image src='images/update.png'width='30px'></a></td><td><a href='deleteprofile.php?id=".$p->getLenderId()."'title='Delete this field'onclick='return confirm_delete();'><image src='images/delete.png'width='30px'></a></td></tr>";
	$i++;
}	
echo "</table>";
?>
</center>
<br><br><br><br><br><br><br>
</div>
<div id="right">
<?php
include"updateprofile.php";
if(isset($_GET['lender_id'])){
$lender_id=$_GET['lender_id'];
$p=new Profile();
$profiles=$p->getLenderProfile($lender_id);
$i=0;
foreach($profiles as $p){
	$names=$p->getName();
	$gender=$p->getGender();
	$address=$p->getAddress();
	$phone=$p->getPhone();
}
?>
<center>
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="">
<h5><font color="#0080ff">Edit profile of customer</font></h5>
<div class="form-group">
<label for="name" class="control-label">
Names:</label>
<input type="text" class="form-control" name="lender_name" value="<?php echo $names;?>" required>
</div>
<div class="form-group">
<label for="Gender" class="control-label">
Gender:</label>
<label>
<select method="POST" name="gender">
<option selected><?php echo $gender;?></option> 
<option>Male</option>
<option>Female</option>     
</div>
<div class="form-group">
<label for="phone" class="control-label">
Phone:</label>
<input type="text" class="form-control" name="phone" value="<?php echo $phone;?>" required>
</div>
<div class="form-group">
<label for="address" class="control-label">
Address:</label>
<input type="text" class="form-control" name="address"value="<?php echo $address;?>">
</div>
 <div class="form-group">                
 <button type="submit" class="btn btn-default" name="update">Save</button>  
<button type="reset" class="btn btn-default" name="reset">Cancel</button>     
 </div>
   <?php 
 if(isset($_POST['update'])){
echo $_SESSION['confirm'];
unset($_SESSION['confirm']);
 }
 ?>
</form>
</center>
<?php
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