<?php 
include 'db.php';
include 'loan.php';

$id = $_GET['id'];

$p = new Profile();

$p->deleteProfile($id);

header ('Location: viewprofiles.php');

?>