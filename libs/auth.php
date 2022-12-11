<?php

if(file_exists('./settings.php')) {
	require_once('./settings.php');
} else {
	require_once('../settings.php');
}



function signup($connection,$email,$password,$firstname,$lastname,$type){
	$query=$connection->prepare('SELECT * FROM '.$type.' WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()>0) return false;
	$query=$connection->prepare('INSERT INTO '.$type.'(email,password, firstname,lastname) VALUES(?,?,?,?)');
	$query->execute([$email,password_hash($password,PASSWORD_DEFAULT),$firstname,$lastname]);
	return true;
}

function signin($connection,$email,$password,$type){
	$query=$connection->prepare('SELECT * FROM '.$type.' WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()==0) return false; 
	$result=$query->fetch();
	if(!password_verify($password, $result['password'])) return false;
	$_SESSION['ID']=$result['ID'];
	$_SESSION['firstname']=$result['firstname'];
	$_SESSION['lastname']=$result['lastname'];
	return true;
}

function signout() {
	$_SESSION = [];
	session_destroy();
}