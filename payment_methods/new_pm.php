<?php

require_once('../settings.php');
require_once('../theme/header.php');

if(count($_POST)>0){
	$query=$connection->prepare('INSERT INTO payment_methods (user_ID, number, expdate, security, name, zip) VALUES (?, ?, ?, ?, ?, ?)');
	$query->execute([$_SESSION['ID'], $_POST['number'], $_POST['expdate'], $_POST['security'], $_POST['name'], $_POST['zip']]);
}

?>

<form method="POST">
  Credit Card Number: <input name="number" type="text" /><br>
  Expiration Date: <input name="expdate" type="date" /><br>
  Security Code: <input name="security" type="text" /><br>
  Name on Card: <input name="name" type="text" /><br>
  Zip Code: <input name="zip" type="text" /><br>
  <button type="submit">Submit</button>	
</form><br><br>

<?php

require_once('../theme/footer.php');

