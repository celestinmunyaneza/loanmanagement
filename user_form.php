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
<script language="javascript">
function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }
    if(form.password.value != "" && form.password.value == form.cpassword.value) {
      if(!checkPassword(form.password.value)) {
        alert("The password you have entered is not valid!");
        form.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed password!");
      form.password.focus();
      return false;
    }
	
    return true;
  }
  </script>
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
<form class="form-horizontal" name="form1" onSubmit="return checkForm(this);" role="form" enctype = "multipart/form-data" method="POST" action="adduser.php">
<h1>Create new user</h1>
<div class="form-group">
<label for="Names" class="col-sm-2 control-label">
Names:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="names" placeholder="Enter names" required>
</div>
</div>
<div class="form-group">
<label for="Username" class="col-sm-2 control-label">
Username:</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="username" placeholder="Enter username" required>
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-2 control-label">
password:</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password" placeholder="Enter password" required>
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-2 control-label">
Confirm password:</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="cpassword" placeholder="Confirm password" required>
</div>
</div>

 <div class="form-group">       
 <div class="col-sm-offset-2 col-sm-10">          
 <button type="submit" class="btn btn-default" name="submit">Login</button> 
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