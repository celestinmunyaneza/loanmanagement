<?php include "db.php";?>
  <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Hide Or Unhide Menu</a>
            </div>

        </div>
        <!-- /.container -->
    </nav>
<div class="navbar navbar-default navbar-fixed-top"" id="bs-example-navbar-collapse-1">
<div id="heading" class="heading">
<div id="menu">
<ul class="nav nav-tabs">
<li><a href="index.php"class="btn btn-primary btn-xs">Home</a></li>
<li><a href="services.php"class="btn btn-primary btn-xs">Services</a></li>
<li><a href="viewcredit.php"class="btn btn-primary btn-xs">Credits</a></li>
<li><a href="viewcreditdetail.php"class="btn btn-primary btn-xs">Detail</a></li>
<li><a href="viewpayment.php"class="btn btn-primary btn-xs">Paid</a></li>
<li><a href="viewnopayment.php"class="btn btn-primary btn-xs">No paid</a></li>
<li><a href="viewprofiles.php"class="btn btn-primary btn-xs">Profile</a></li></ul>
</div>
<div id="search">
<p>
<form method="POST"action="">
&nbsp;&nbsp;
<input type="text"placeholder="search"name="search">
<input type="submit"name="submit"value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div id="user">
<ul class="nav nav-tabs">
<li><a href="help.php"class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"></span>Help</a></li>
<li class="dropdown"><a class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>Admin<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="logout.php">Logout</a></li>
<li><a href="changepassword_form.php">Change password</a></li>
<li><a href="viewprofile.php">view profile</a></li>
<li><a href="user_form.php">create user</a></li>
</ul></li>
</p>

</ul>
</div>
</div>
<div id="profile">
<h1><i>Loan management system</i></h1>
<?php include "loan.php";?>
</div>
</div>