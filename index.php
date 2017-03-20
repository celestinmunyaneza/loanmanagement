<?php
include "getauthentication.php";
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-casual.css" rel="stylesheet" type="text/css">
<style>
body{
    background-color:#009999;
}
</style>
</head>
<body>
<div id="container">

<div id="body">
<div id="header">
<div id="logo">
<image src="images/homepage.jpg"height="100%"width="100%">
</div>
<div id="header1">
<h1 align="center">LOAN MANAGEMENT SYSTEM</h1>
</div>
</div>
<div id="login">
<form class="form-horizontal" role="form" enctype = "multipart/form-data" method="POST" action="">
<h1 align="center">LOGIN</h1>
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
 <div class="col-sm-offset-2 col-sm-10">          
 <button type="submit" class="btn btn-default" name="submit">Login</button> 
 </div>    
 </div>
 <?php
   if(isset($_POST["submit"])){
    echo "<center>".$msg."</center>";
   }
?>
</div>
</div>
<div class="footer" id="footer">
<h1><label>Copyright &copy; All Reserved to CELESTIN MUNYANEZA <?php echo date('Y')?></label></h1>
</div>
</div>
</body>
</html>