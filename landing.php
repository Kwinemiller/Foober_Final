<?php

require_once('theme/header.php');

?>

  <h1>Welcome to Foober!</h1>
  <h2>Please Select an Option:</h2>
	<a href="libs/login.php?flag=0">Passenger</a>
	<a href="libs/login.php?flag=1">Driver</a>
	<a href="libs/login.php?flag=2">Admin</a><br><br>
	<a href="guestindex.php">Or continue as guest!</a>
  
<?php

require_once('theme/footer.php');

?>