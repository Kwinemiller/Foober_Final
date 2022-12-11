<?php

require_once('../settings.php');
require_once('../theme/header.php');

if(count($_POST)>0){
	require_once('auth.php');
	if ($_GET['flag'] == 0) {
		if(signup($connection,$_POST['email'],$_POST['password'], $_POST['firstname'], $_POST['lastname'], "users")){
			header('location: login.php?flag='.$_GET['flag'].'');
			die();
		}else echo 'Signup failed';
	} else if ($_GET['flag'] == 1) {
		if(signup($connection,$_POST['email'],$_POST['password'], $_POST['firstname'], $_POST['lastname'], "drivers")){
			header('location: login.php?flag='.$_GET['flag'].'');
			die();
		}else echo 'Signup failed';
	} else if ($_GET['flag'] == 2) {
		echo 'Error: Cannot create new admin account';
	}
}
?>

<form method="POST">
	<h1>Create an Account</h1>
	Email: <input name="email" type="email" /><br>
	Password: <input name="password" type="password" /><br>
	First Name: <input name="firstname" type="text" /><br>
	Last Name: <input name="lastname" type="text" /><br>
	<button type="submit">Sign up</button>	
</form>

<?php
require_once('../theme/footer.php');