<?php
require_once('../settings.php');

/*if($_SESSION['role']==0 || $_SESSION['role']==1){
	die('You are not authorized to modify a category');
	
}*/
if(count($_POST)>0){
	$query=$connection->prepare('UPDATE payment_methods SET number=?, expdate=?, security=?, name=?, zip=? WHERE ID=?');
	$query->execute([$_POST['number'],$_POST['expdate'],$_POST['security'],$_POST['name'],$_POST['zip'],$_GET['id']]);
}
$query=$connection->prepare('SELECT * FROM payment_methods WHERE ID=?');
$query->execute([$_GET['id']]);
$payment_method=$query->fetch();

?>

<form method="POST">
  Credit Card Number: <input name="number" type="text" value="<?= $payment_method['number']?>" /><br>
  Expiration Date: <input name="expdate" type="date" value="<?= $payment_method['expdate']?>" /><br>
  Security Code: <input name="security" type="text" value="<?= $payment_method['security']?>" /><br>
  Name on Card: <input name="name" type="text" value="<?= $payment_method['name']?>" /><br>
  Zip Code: <input name="zip" type="text" value="<?= $payment_method['zip']?>" /><br>
  <button type="submit">Submit</button>	
</form>