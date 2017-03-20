<?php
class Admin{
	private $id;
	private $names;
	private $username;
	private $password;
	private $picture;
public function setId($id){
	$this->id=$id;
}
public function getId(){
	return $this->id;
}
public function setNames($names){
	$this->names=$names;
}
public function getNames(){
	return $this->names;
}
public function setUsername($username){
	$this->username=$username;
}
public function getUsername(){
	return $this->username;
}
public function setPassword($password){
	$this->password=$password;
}
public function getPassword(){
	return $this->password;
}
public function setPicture($picture){
	$this->picture=$picture;
}
public function getPicture(){
	return $this->picture;
}
public function addAdmin(){
	db::connect();
	$query=mysql_query("insert into admin (names,username,password,picture)values('".mysql_real_escape_string($this->names)."','$this->username','$this->password','$this->picture')")
	or die(mysql_error());
}
public function getAuthentication($username,$password){
	db::connect();
	$query=mysql_query("select * from admin where username='".$username."' and password='".$password."'");
	 $i=0;
	  $admins = array ();

	  while ($row=mysql_fetch_array($query)) {
		$p = new Admin();
		$p->setNames($row['names']);
		$p->setUsername($row['username']);
		$p->setPassword($row['password']);
		$p->setPicture($row['picture']);
	

		$admins[$i] = $p;
		
		$i++;
	}
	return $admins;
}
public function ChangePassword($password){
	db::connect();
	$query=mysql_query("update admin set password='".$this->password."' where password='".$password."'");
}
public function deleteAdmin($id){
	db::connect();
	$query=mysql_query("delete * from admin where id='.$id.'");
}
public function ChangePhoto($password){
	db::connect();
	$query=mysql_query("update admin set picture='".$this->picture."' where username='".$username."'");
}
public function getProfile($username){
	db::connect();
	$query=mysql_query("select * from admin where username='".$username."'");
	 $i=0;
	  $admins = array ();

	  while ($row=mysql_fetch_array($query)) {
		$p = new Admin();
		$p->setId($row['id']);
		$p->setNames($row['names']);
		$p->setUsername($row['username']);
		$p->setPassword($row['password']);
		$p->setPicture($row['picture']);
	

		$admins[$i] = $p;
		
		$i++;
	}
	return $admins;
}
public function ChangeProfile($id){
	db::connect();
	$query=mysql_query("update admin set names='".mysql_real_escape_string($this->names)."',username='$this->username' where id='".$id."'")or die(mysql_error());
}
public function getAdmins(){
	db::connect();
	$query=mysql_query("select * from admin");
	 $i=0;
	  $admins = array ();

	  while ($row=mysql_fetch_array($query)) {
		$p = new Admin();
		$p->setId($row['id']);
		$p->setNames($row['names']);
		$p->setUsername($row['username']);
		$p->setPassword($row['password']);
		$p->setPicture($row['picture']);
	

		$admins[$i] = $p;
		
		$i++;
	}
	return $admins;
}
}
?>