<?php
session_start();
if(isset($_SESSION['alogin'])){

?>
<!DOCTYPE html>
<html>
<head>
<?php include "style.php";?>
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
<h1>IBYO DUKORA</h1>
<p>
<ol>
<font color="blue" size="4">
<li>Website design</li>
<li>Software zitandukanye(harimo iz' ubucuruzi,amashuri,n' izindi zose zishoboka)</li>
<li>Byumwihariko tubafitiye stock management system zitandukanye kubabyifuza</li>
<li>Dukora na za mudasobwa (computer maintenance)</li>
<li>Dutanga na application za telephone na computer kubazikeneye</li>
</font>
</ol>
</p>
<marquee><h3<b><font color="white">Duhamagare kuri 0783214495, 0722214495</font></b></h3></marquee>
<h3>Ubufasha</h3>
<p>Mugihe ugize ikibazo cg udukeneye ushobora kudusanga aho dukorera mu mujyi wa Musanze mu Ibereshi rya Gatandatu Kuri IT Support Service.</p>
<h3>Contact zacu</h3>
<table border="1" align="center">
<tr><th>Amazina</th><th>Telefone</th><th>Email</th></tr>
<tr><td>Munyaneza Celestin</td><td>0783214485/0722214495</td><td>celngomu@gmail.com</td></tr>
</table>
<br><br><br><br><br><br><br>
</div>
<div id="right">
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