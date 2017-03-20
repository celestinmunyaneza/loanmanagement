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
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="changeprofile.php">
<h1>Change profile</h1>
<div class="form-group">
<label for="id" class="col-sm-2 control-label">
</label>
<div class="col-sm-10">
<input type="hidden" class="form-control" name="id"value="<?php echo $_GET['id'];?>" required>
</div>
</div>
<div class="form-group">
<label for="names" class="col-sm-2 control-label">
Names:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="names" value="<?php echo $_SESSION['uname'];?>" required>
</div>
</div>
<div class="form-group">
<label for="username" class="col-sm-2 control-label">
Username:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="uname" value="<?php echo $_SESSION['alogin'];?>" required>
</div>
</div>
 <div class="form-group">       
 <div class="col-sm-offset-2 col-sm-10">          
 <button type="submit" class="btn btn-default" name="submit">Change</button> 
 </div>    
 </div>
 <br><br><br><br><br><br><br>
 </div>
 <div id="right">
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