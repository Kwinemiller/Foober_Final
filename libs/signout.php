<?php
require_once('../settings.php');
if(count($_SESSION)>0 && is_numeric($_SESSION['ID'])){
	require_once('auth.php');
	signout();
}
header('location: ../landing.php');
die();