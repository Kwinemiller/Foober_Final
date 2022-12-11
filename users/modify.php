<?php
require_once('../settings.php');
require_once('../theme/header.php');
	
if(count($_POST)>0){
	$query=$connection->prepare('UPDATE users SET firstname=?, lastname=?, email=? WHERE ID=?');
	$query->execute([$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_GET['userid']]);
}
$query=$connection->prepare('SELECT * FROM users WHERE ID=?');
$query->execute([$_GET['userid']]);
$users=$query->fetch();

?>

<form method="POST">
First Name:<input type="text" name="firstname" value="<?= $users['firstname'] ?>" /><br />
Last Name:<input type="text" name="lastname" value="<?= $users['lastname'] ?>" /><br />
Email:<input type="email" name="email" value="<?= $users['email'] ?>" /><br />
<button type="submit">Submit</button>
</form>

<a href="../drivers/userindex.php">Back to  Driver Index</a>

<?php

require_once('../theme/footer.php');

?>