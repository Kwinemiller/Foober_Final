<?php

require_once('../settings.php');

require_once('../theme/header.php');
?>

<!doctype>
<html>
<head>
	<title>Access your account</title>
	<h1>Welcome to Foober!</h1>
	<h2>Please Log In</h2>
	

</head>
<body>
	
<?php
if(count($_POST)>0){
	require_once('auth.php');
	if ($_GET['flag'] == 0) {
		if(signin($connection,$_POST['email'],$_POST['password'], "users")){
			$_SESSION['role']=0;
			header('location: ../drivers/userindex.php');
			die();
		}else echo 'Signin failed';
	} else if ($_GET['flag'] == 1) {
		if(signin($connection,$_POST['email'],$_POST['password'], "drivers")){
			$_SESSION['role']=1;
			header('location: ../rides/driverrides.php');
			die();
		}else echo 'Signin failed';
	} else if ($_GET['flag'] == 2) {
		if(signin($connection,$_POST['email'],$_POST['password'], "admins")){
			$_SESSION['role']=2;
			header('location: ../admin/index.php');
			die();
		}else echo 'Signin failed';
	}
}
?>
<form method="POST">
	Username:<input name="email" type="email" /><br>
	Password:<input name="password" type="password" /><br>
	<button type="submit">Sign in</button>	
</form>
<br><br>
<a href="signup.php?flag=<?= $_GET['flag']?>">Or Sign Up!</a>
</body>
</html>

<?php
require_once('../theme/footer.php');
?>